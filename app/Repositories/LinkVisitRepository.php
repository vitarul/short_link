<?php

namespace App\Repositories;

use App\Link;
use App\LinkVisit;
use Carbon\Carbon;

class LinkVisitRepository
{
    public function createLinkVisit(Link $link, ?string $showedPicture): LinkVisit
    {
        $linkVisit = new LinkVisit([
            'link_id' => $link->id,
            'showed_picture' => $showedPicture,
        ]);

        $linkVisit->save();

        return $linkVisit;
    }
}
