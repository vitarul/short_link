<?php

namespace App\Services;

use App\Link;
use App\LinkVisit;
use App\Repositories\LinkVisitRepository;
use Illuminate\Support\Facades\File;

class LinkVisitRegistrar
{
    private $linkVisitRepository;

    public function __construct(LinkVisitRepository $linkVisitRepository)
    {
        $this->linkVisitRepository = $linkVisitRepository;
    }

    public function addLinkVisit(Link $link): LinkVisit
    {
        $showedPicture = $link->is_commercial
            ? $this->getShowedPicture()
            : null;

        return $this->linkVisitRepository->createLinkVisit($link, $showedPicture);
    }

    private function getShowedPicture(): string
    {
        $pictures = File::allFiles(public_path('pictures'));

        return $pictures[array_rand($pictures)]->getFilename();
    }
}
