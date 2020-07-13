<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Link;
use App\Repositories\LinkRepository;
use App\Services\LinkCodeGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LinkController extends Controller
{
    private $linkRepository;
    private $linkCodeGenerator;

    public function __construct(LinkRepository $linkRepository, LinkCodeGenerator $linkCodeGenerator)
    {
        $this->linkRepository = $linkRepository;
        $this->linkCodeGenerator = $linkCodeGenerator;
    }

    public function home(): RedirectResponse
    {
        return redirect(route('link.create'));
    }

    public function createLink(): View
    {
        $link = session('link', null);

        return view('home', compact('link'));
    }

    public function storeLink(LinkRequest $request): RedirectResponse
    {
        $data = $request->getData();

        $data['code'] = $this->linkCodeGenerator->getLinkCode($data['code']);

        $link = $this->linkRepository->createLink($data);

        return redirect(route('link.create'))->with(['link' => $link]);
    }

    public function statsLinkVisit(Link $link): View
    {
        $linkVisits = $this->linkRepository->getLinkVisitsWithPagination($link);

        return view('linkStats', compact('linkVisits', 'link'));
    }

    public function statsLinks(): View
    {
        $linkStats = $this->linkRepository->getStatsLinksWithPagination();

        return view('stats', compact('linkStats'));
    }
}
