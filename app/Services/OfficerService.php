<?php

namespace OGame\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use OGame\Enums\DarkMatterTransactionType;
use OGame\Enums\OfficerType;
use OGame\Models\User;
use OGame\Models\UserOfficer;

class OfficerService
{
    public const int COST = 5000;
    public const int DURATION_DAYS = 7;

    public function __construct(private DarkMatterService $darkMatterService)
    {
    }

    /**
     * @return array<string, \Illuminate\Support\Carbon|null>
     */
    public function getActiveOfficers(User $user): array
    {
        /** @var \Illuminate\Database\Eloquent\Collection<int, UserOfficer> $records */
        $records = $user->officers()
            ->where('expires_at', '>', now())
            ->get();

        /** @var array<string, \Illuminate\Support\Carbon|null> $activeOfficers */
        $activeOfficers = [];
        foreach (OfficerType::cases() as $officer) {
            $activeOfficers[$officer->value] = null;
        }

        foreach ($records as $record) {
            $activeOfficers[$record->officer] = $record->expires_at;
        }

        return $activeOfficers;
    }

    /**
     * @throws Exception
     */
    public function activate(User $user, OfficerType $officer): void
    {
        DB::transaction(function () use ($user, $officer): void {
            $lockedUser = User::whereKey($user->id)->lockForUpdate()->first();
            if ($lockedUser === null) {
                throw new Exception('User not found.');
            }

            $record = UserOfficer::where('user_id', $lockedUser->id)
                ->where('officer', $officer->value)
                ->lockForUpdate()
                ->first();

            $start = $record !== null && $record->expires_at->isFuture()
                ? $record->expires_at->copy()
                : now();

            if (!$this->darkMatterService->canAfford($lockedUser, self::COST)) {
                throw new Exception(__('t_ingame.officers.insufficient_dark_matter'));
            }

            $this->darkMatterService->debit(
                $lockedUser,
                self::COST,
                DarkMatterTransactionType::OFFICER->value,
                'Activated officer: ' . $officer->value
            );

            $record ??= new UserOfficer([
                'user_id' => $lockedUser->id,
                'officer' => $officer->value,
            ]);
            $record->expires_at = $start->addDays(self::DURATION_DAYS);
            $record->save();
        });
    }
}
