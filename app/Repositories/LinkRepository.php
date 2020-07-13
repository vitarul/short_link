<?php

namespace App\Repositories;

use App\Link;
use Carbon\Carbon;

class LinkRepository
{
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
}
