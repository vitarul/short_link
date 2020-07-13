<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRepository;
use App\Repositories\LinkVisitRepository;
use App\Services\LinkVisitRegistrar;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;

class LinkVisitController extends Controller
{
    private $linkVisitRepository;
    private $linkRepository;
    private $linkVisitRegistrar;

    public function __construct(
        LinkVisitRepository $linkVisitRepository,
        LinkRepository $linkRepository,
        LinkVisitRegistrar $linkVisitRegistrar
    ) {
        $this->linkRepository = $linkRepository;
        $this->linkVisitRepository = $linkVisitRepository;
        $this->linkVisitRegistrar = $linkVisitRegistrar;
    }

    public function visitLink(string $linkCode): View
    {
        $link = $this->linkRepository->getActiveLinkByCode($linkCode);

        if (!$link) {
            $errors = new MessageBag(['link_not_found' => 'Такой ссылки нет либо она устарела']);

            return view('visitLink')->withErrors($errors);
        }

        $linkVisit = $this->linkVisitRegistrar->addLinkVisit($link);

        return view('visitLink', compact('linkVisit'));
    }
}
