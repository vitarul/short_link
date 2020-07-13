<?php

namespace App\Repositories;

use App\Link;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class LinkRepository
{
    public const ELEMENTS_PER_PAGE = 20;

    public function createLink(array $data): Link
    {
        $link = new Link([
            'link' => $data['link'],
            'code' => $data['code'],
            'expired_at' => Carbon::now()->addDays($data['expired_at']),
        ]);

        $link->is_commercial = $data['is_commercial'] != null;

        $link->save();

        return $link;
    }

    public function getActiveLinkByCode(string $code): ?Link
    {
        return Link::query()
            ->where('code', $code)
            ->where('expired_at', '>', Carbon::now())
            ->first();
    }

    public function getLinkVisitsWithPagination(Link $link): LengthAwarePaginator
    {
        return $link->visits()->paginate(self::ELEMENTS_PER_PAGE);
    }

    public function getStatsLinksWithPagination(): LengthAwarePaginator
    {
        return DB::table('links', 'l')
            ->selectRaw('COUNT(link_visits.link_id) as visits, l.code as code, l.link as link')
            ->join('link_visits', 'l.id', '=', 'link_visits.link_id')
            ->where('link_visits.created_at', '>=', Carbon::now()->subDays(14))
            ->groupBy(['link_visits.link_id'])
            ->paginate(self::ELEMENTS_PER_PAGE);
    }
}
