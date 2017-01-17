<?php

//gets all courses
function get_courses() {
	global $db;

	$query =	'SELECT *
				FROM courses
				ORDER BY courseID';

		$statement = $db->prepare($query);
		$statement->execute();

	//fills $courses with array
	$courses = $statement->fetchall();
		$statement->closeCursor();
	return $courses;
}

function get_course_record($course_id) {
	global $db;

	$query =	'SELECT *
				FROM courses
				WHERE courseID = :course_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':course_id', $course_id);
		$statement->execute();

	$course = $statement->fetch();
		$statement->closeCursor();
	return $course;
}

function add_course($user_id,
				$course_instructor,
				$course_name,
				$course_code,
				$course_semester,
				$course_start_date) {

	global $db;

	$query =	'INSERT INTO courses
					(userID,
					instructor,
					courseName,
					courseCode,
					semester,
					startDate)
				VALUES (:userID,
					:instructor,
					:courseName,
					:courseCode,
					:semester,
					:startDate)';
		$statement = $db->prepare($query);
		$statement->bindValue(':userID', $user_id);
		$statement->bindValue(':instructor', $course_instructor);
		$statement->bindValue(':courseName', $course_name);
		$statement->bindValue(':courseCode', $course_code);
		$statement->bindValue(':semester', $course_semester);
		$statement->bindValue(':startDate', $course_start_date);
		$statement->execute();
		$statement->closeCursor();
}

function delete_course($course_id) {
	global $db;

	$query =	'DELETE FROM courses
				WHERE courseID = :course_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':course_id', $course_id);
		$statement->execute();
		$statement->closeCursor();
}

function edit_course($course_id,
				$user_id,
				$course_instructor,
				$course_name,
				$course_code,
				$course_semester,
				$course_start_date ) {

	global $db;

	$query =	'UPDATE courses	
				SET userID = :user_id,
					instructor = :course_instructor,
					courseName = :course_name,
					courseCode = :course_code,
					semester = :course_semester,
					startDate = :course_start_date
				WHERE courseID = :course_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':course_id', $course_id);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':course_instructor', $course_instructor);
		$statement->bindValue(':course_name', $course_name);
		$statement->bindValue(':course_code', $course_code);
		$statement->bindValue(':course_semester', $course_semester);
		$statement->bindValue(':course_start_date', $course_start_date);
		$statement->execute();
		$statement->closeCursor();
}



?>