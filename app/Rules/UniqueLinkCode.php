<?php

namespace App\Rules;

use App\Repositories\LinkRepository;
use Illuminate\Contracts\Validation\Rule;

class UniqueLinkCode implements Rule
{
    private $linkRepository;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->linkRepository = $linkRepository;
    }

    /**
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        return $value
            ? $this->linkRepository->getActiveLinkByCode($value) == null && $value != 'service'
            : true;
    }

    public function message(): string
    {
        return 'Ссылка с таким кодом уже существует.';
    }
}
