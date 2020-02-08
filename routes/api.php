<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'courses', 'middleware' => 'jwt.auth'], function ($course) {
    $course -> get('/', 'CourseController@getAllCourses');
    $course -> post('/', 'CourseController@addNewCourse');
});

Route::group(['prefix' => 'levels', 'middleware' => 'jwt.auth'], function ($level) {
    $level -> get('/', 'LevelController@getAllLevels');
    $level -> post('/', 'LevelController@addNewLevel');
});

Route::group(['prefix' => 'requirements', 'middleware' => 'jwt.auth'], function ($requirement) {
    $requirement -> get('/', 'RequirementsController@getAllRequirements');
    $requirement -> post('/', 'RequirementsController@addNewRequirement');
});

Route::group(['prefix' => 'targets', 'middleware' => 'jwt.auth'], function ($target) {
    $target -> get('/', 'TargetController@getAllTargets');
    $target -> post('/', 'TargetController@addNewTarget');
});

Route::group(['prefix' => 'teachers', 'middleware' => 'jwt.auth'], function ($teacher) {
    $teacher -> get('/', 'TeacherController@getAllTeachers');
    $teacher -> post('/', 'TeacherController@addNewTeacher');
});

Route::group(['prefix' => 'topics', 'middleware' => 'jwt.auth'], function ($topic) {
    $topic -> get('/', 'TopicController@getAllTopics');
    $topic -> post('/', 'TopicController@addNewTopic');
});

Route::group(['prefix' => 'auth'], function($auth){
    $auth ->post('/login', 'AuthenticateController@authenticate')->name('login');
    $auth ->post('/register', 'AuthenticateController@register')->name('register');
});

Route::group(['prefix' => 'students', 'middleware' => 'jwt.auth'], function($student){
    $student -> get('/', 'StudentController@getAllStudents');
    $student -> post('/', 'StudentController@addNewStudent');
});