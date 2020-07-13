<?php

namespace App\Services;

use App\Repositories\LinkRepository;
use Illuminate\Support\Str;

class LinkCodeGenerator
{
    public const LINK_CODE_LENGTH = 8;

    private $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    public function getLinkCode(?string $linkCode): string
    {
        if ($linkCode) {
            return $linkCode;
        }

        $randomCode = $this->generateLinkCode();

        while ($this->linkRepository->getActiveLinkByCode($randomCode)) {
            $randomCode = $this->generateLinkCode();
        }

        return $randomCode;
    }

    public function generateLinkCode(): string
    {
        return Str::random(self::LINK_CODE_LENGTH);
    }
}
