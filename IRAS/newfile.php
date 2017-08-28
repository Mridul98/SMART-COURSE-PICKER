<?php
$permit = true;
$second_permit = true;
//listing the course names ..........
$course_one = strtolower($_POST['course_one']);
$course_two = strtolower($_POST['course_two']);
$course_three = strtolower($_POST['course_three']);
$course_four = strtolower($_POST['course_four']);
$course_five = strtolower($_POST['course_five']);
$course_six =strtolower($_POST['course_six']);
$course_seven = strtolower($_POST['course_seven']);

//listing the courses section.......
$one = $_POST['one'];
$two = $_POST['two'];
$three = $_POST['three'];
$four = $_POST['four'];
$five = $_POST['five'];
$six = $_POST['six'];
$seven = $_POST['seven'];


//inserting the courses scheduled day......
$day_one = $_POST['one_day'];
$day_two = $_POST['two_day'];
$day_three = $_POST['three_day'];
$day_four = $_POST['four_day'];
$day_five = $_POST['five_day'];
$day_six = $_POST['six_day'];
$day_seven = $_POST['seven_day'];


//inserting the courses scheduled time...
$time_one = $_POST['onet'];
$time_two = $_POST['twot'];
$time_three = $_POST['threet'];
$time_four = $_POST['fourt'];
$time_five = $_POST['fivet'];
$time_six = $_POST['sixt'];
$time_seven = $_POST['sevent'];


//inserting the scheduled date and time in an array.....
$final_time[] = string_manipulate("$day_one$time_one");
$final_time[] =string_manipulate("$day_two$time_two") ;
$final_time[] = string_manipulate("$day_three$time_three");
$final_time[] = string_manipulate("$day_four$time_four");
$final_time[] = string_manipulate("$day_five$time_five");
$final_time[] = string_manipulate("$day_six$time_six");
$final_time[] = string_manipulate("$day_seven$time_seven");

$final_time_length = count($final_time);







//inserting the courses section in an array...
$section[] = $one;
$section[] = $two;
$section[] = $three;
$section[] = $four;
$section[] = $five;
$section[] = $six;
$section[] = $seven;

 



//inserting the course names in an array......
$name[] = $course_one;
$name[] = $course_two;
$name[] = $course_three;
$name[] = $course_four;
$name[] = $course_five;
$name[] = $course_six;
$name[] = $course_seven;
$name_length = count($name);



function string_manipulate($string)
{
	$first = str_replace('0', '', $string);
	$second = str_replace('-', '', $first);
	$third = str_replace(':', '', $second);
	$fourth = strtolower(str_replace(';','',$third));
	return $fourth;
}






for($i=0;$i<$name_length;$i++)
{
	
	for($j = ($i+1);$j<$name_length;$j++)
	{
		if($name[$j] == ''&& $name[$i]=='')
		{
			continue;
		}
		else 
		
		if(($name[$i] == $name[$j]))
		{   $permit = false;
			echo "You choose $name[$i] twice!!!"."<br>";
			break;
		}
	}
	
}

if($permit == true)
{
	for($k =0 ;$k<$final_time_length;$k++)
	{
		for($l = ($k+1);$l<$final_time_length;$l++)
		{   if($final_time[$l]==''&&$final_time[$k]=='')
		{
			continue;
		}
		else 
			if($final_time[$l]==$final_time[$k])
			{   
				$second_permit = false;
				echo "YOU CANNOT CHOOSE MORE THAN ONE COURSES IN SAME TIME SCHEDULE!!!...PLEASE FIX THE SCHEDULE OF $final_time[$l] and $final_time[$k]";
				break;
			}
		}
	}
}
if($permit == true && $second_permit==true)
{
  echo <<<_END
  <pre>
  
  heres your course lists :
  
  
  course name : $course_one               section : $one           time :$final_time[0]
  course name : $course_two               section : $two           time :$final_time[1]
  course name : $course_three             section : $three         time :$final_time[2]
  course name : $course_four              section : $four          time :$final_time[3]
  course name : $course_five              section : $five          time :$final_time[4]
  course name : $course_six               section : $six           time :$final_time[5]
  course name : $course_seven             section : $seven         time :$final_time[6]
 </pre>
  
  
  
  
_END;
}






//echo  $course_one ."<br>".$course_two."<br>".$course_three."<br>".$course_four."<br>".$course_five."<br>".$course_six."<br>".$course_seven;
      




echo <<<_END
<pre>
		<form action = 'newfile.php' method = 'post'>
select courses: <input type = "text" name = 'course_one'> section :<input type = 'number' name  = 'one'> time :<input type = 'text' name = 'onet'> day : <input type = 'text' name = 'one_day'>

select courses: <input type = "text" name = 'course_two'> section :<input type = 'number' name  = 'two'> time :<input type = 'text' name = 'twot'> day : <input type = 'text' name = 'two_day'>
		
select courses: <input type = "text" name = 'course_three'> section :<input type = 'number' name  = 'three'> time :<input type = 'text' name = 'threet'> day : <input type = 'text' name = 'three_day'>
		
select courses: <input type = "text" name = 'course_four'> section :<input type = 'number' name  = 'four'> time :<input type = 'text' name = 'fourt'> day : <input type = 'text' name = 'four_day'>
		
select courses: <input type = "text" name = 'course_five'> section :<input type = 'number' name  = 'five'> time :<input type = 'text' name = 'fivet'>day : <input type = 'text' name = 'five_day'>
		
select courses: <input type = "text" name = 'course_six'> section :<input type = 'number' name  = 'six'> time :<input type = 'text' name = 'sixt'> day : <input type = 'text' name = 'six_day'>
		
select courses: <input type = "text" name = 'course_seven'> section :<input type = 'number' name  = 'seven'> time :<input type = 'text' name = 'sevent'> day : <input type = 'text' name = 'seven_day'>
		

<input type ='submit' value = 'enter'>


</form>
</pre>




_END;









?>