<?php

namespace App\Interfaces;

interface ParentInterface
{
    public function storeParent($parentData);

    public function checkPasswordReset($parentData);

    public function storeOtp($parentData, $pin);

    public function getOtpRecord($email);

    public function getParentByEmail($email);

    public function updateEmailVerification($email);

    public function deleteOtpRecord($email);

    public function fetchStudentByParent($parent);

    public function getUnpaidStudentEnrollments();

    public function getEnrolledStudents($parentId);



    

   

    
}
