<?php

namespace App\Service;

class PasswordPolicyService
{
    private int $minLength;
    private array $commonPasswords;

    public function __construct(int $minLength = 10, array $commonPasswords = [])
    {
        $this->minLength = $minLength;
        $this->commonPasswords = $commonPasswords;
    }

    /**
     * Analyse le mot de passe et retourne les critères et score.
     *
     * @return array{
     *   lengthOk: bool,
     *   upperOk: bool,
     *   digitOk: bool,
     *   specialOk: bool,
     *   scorePercent: int,
     *   isCommon: bool
     * }
     */
    public function evaluate(string $password): array
    {
        $lengthOk = mb_strlen($password) >= $this->minLength;
        $upperOk = preg_match('/[A-Z]/', $password) === 1;
        $digitOk = preg_match('/\d/', $password) === 1;
        $specialOk = preg_match('/\W/', $password) === 1;

        $passed = [$lengthOk, $upperOk, $digitOk, $specialOk];
        $score = (count(array_filter($passed)) / count($passed)) * 100;

        $isCommon = in_array(strtolower($password), array_map('strtolower', $this->commonPasswords), true);

        return [
            'lengthOk' => $lengthOk,
            'upperOk' => $upperOk,
            'digitOk' => $digitOk,
            'specialOk' => $specialOk,
            'scorePercent' => (int) round($score),
            'isCommon' => $isCommon,
        ];
    }

    /**
     * Indique si le mot de passe est globalement valide.
     */
    public function isValid(string $password): bool
    {
        $res = $this->evaluate($password);

        return !$res['isCommon'] &&
            $res['lengthOk'] &&
            $res['upperOk'] &&
            $res['digitOk'] &&
            $res['specialOk'];
    }
}
