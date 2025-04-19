<?php

namespace App\Helpers;

use App\Repositories\ClassScheduleRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\StudentRepository;
use App\Repositories\StudentScheduleRepository;
use App\Repositories\SubscriptionRepository;

class RepositoryHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct 
    ( public StudentRepository $studentRepository,
      public ClassScheduleRepository $classScheduleRepository,
      public StudentScheduleRepository $studentScheduleRepository,
      public PaymentRepository $paymentRepository,
      public SubscriptionRepository $subscriptionRepository,
    )
    {
       
    }

    public function getStudentCourseLevel($student_id)
    {    

        return $this->studentRepository->getStudentCourseLevel($student_id);
    }
    

    public function  getCourseLevelDetails($studentLevel)
    {
         return $this->studentRepository->getCourseLevelDetails($studentLevel);

    }


    public function getTimeZones()
    {
        return $this->classScheduleRepository->getTimeZones();
    }

    public function getStudentSchedule($studentId)
    {
        return $this->studentScheduleRepository->getStudentSchedule($studentId);
    }

    public function getStudentByParent($studentId, $parentId)
    {
        return $this->studentRepository->getStudentByParent($studentId, $parentId);

    }

    public function getApprovedPaymentsForParent($parentId)
    {
       return  $this->paymentRepository->getApprovedPaymentsForParent($parentId);
    }

    public function getPendingPaymentsForParent($parentId)
    {
        return  $this->paymentRepository->getPendingPaymentsForParent($parentId);
    }

    public function getDeclinedPaymentsForParent($parentId)
    {
        return  $this->paymentRepository->getDeclinedPaymentsForParent($parentId);
    }

    public function markSubscriptionAsInactive()
    {
        return $this->subscriptionRepository->markSubscriptionAsInactive();
    }


   



}
