<?php

namespace App\Validator;

use App\Repository\TvShowRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TVDBIdValidator extends ConstraintValidator
{
    protected TvShowRepository $tvShowRepository;

    public function __construct(TvShowRepository $tvShowRepository)
    {
        $this->tvShowRepository = $tvShowRepository;
    }

    public function validate($value, Constraint $constraint): void
    {
        /* @var TVDBId $constraint */
        if (null === $value || '' === $value) {
            return;
        }

        $tvShow = $this->tvShowRepository->findByTheTvDbId($value);

        if ($tvShow) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->setParameter('{{ tvshow }}', $tvShow->getName())
                ->addViolation();
        }
    }
}
