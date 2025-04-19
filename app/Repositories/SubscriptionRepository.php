<?php

namespace App\Repositories;

use App\Enums\FeeStatus;
use App\Enums\SubscriptionStatus;
use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class SubscriptionRepository implements SubscriptionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllActiveSubscriptions()
    {
        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course'
        ])->active()
            ->get();
    }

    public function getAllInActiveSubscriptions()
    {
        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course'
        ])->inActive()
            ->get();
    }

    public function getParentActiveSubscriptions($parentId)
    {

        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course'
        ])
            ->where('parent_id', $parentId)
            ->active()
            ->paginate(2);
    }

    public function getParentInActiveSubscriptions($parentId)
    {

        return Subscription::with([
            'parent:id,name',
            'student:id,name',
            'courseLevel.course'
        ])
            ->where('parent_id', $parentId)
            ->inActive()
            ->paginate(2);
    }

    public function markSubscriptionAsInactive()
    {

        return DB::transaction(function () {

            $expiredSubscriptions = Subscription::where('end_date', '<=', now())
                ->where('is_active', SubscriptionStatus::Active->value)
                ->with('student.studentCourseLevels')
                ->get();

                $processedCount = 0;

            foreach ($expiredSubscriptions as $subscription) {
                $student = $subscription->student;

                if ($student) {
                    // Step 2: Update student_course_levels to set is_paid to UNPAID
                    $student->studentCourseLevels()->update([
                        'is_paid' => FeeStatus::UNPAID->value,
                    ]);
                }

                // Step 3: Mark the subscription as inactive
                $subscription->update([
                    'is_active' => SubscriptionStatus::Inactive->value,
                ]);

                $processedCount++;
            }

            return $processedCount;
        });
    }
}
