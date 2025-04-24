<?php

namespace App\Helpers;

use App\Models\ClassSchedule;
use App\Repositories\ClassScheduleRepository;
use App\Repositories\CourseMaterialRepository;
use App\Repositories\CourseRepository;
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
    ( private StudentRepository $studentRepository,
      private ClassScheduleRepository $classScheduleRepository,
      private StudentScheduleRepository $studentScheduleRepository,
      private PaymentRepository $paymentRepository,
      private SubscriptionRepository $subscriptionRepository,
      private CourseRepository $courseRepository,
      private CourseMaterialRepository $courseMaterialRepository,
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

    public function getAllCourses()
    {
         return $this->courseRepository->getAllCourses();
    }

    public function getStudentCourseResources($courseId, $courseLevelId)
    {   
        return  $this->courseMaterialRepository->getStudentCourseResources($courseId, $courseLevelId);
    }

    public function getClassSheduleById($classScheduleId)
    {
        return ClassSchedule::find($classScheduleId);
    }

    public function getStudentByClassSchedule($classSchedule)
    {
       return $this->studentScheduleRepository->getStudentByClassSchedule($classSchedule);
    }

    public function getStudentScheduleById(int $studentId)
    {
        return $this->studentScheduleRepository->getStudentScheduleById(studentId:$studentId);
    }


   



}
