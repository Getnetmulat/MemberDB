<?php 
//include 'includes/session.php';

if(isset($_POST["from"], $_POST["to"],$_POST["branchid"],$_POST["courseid"],$_POST["batchid"])){
        $from = $_POST["from"];
        $to = $_POST["to"];
        $branchid = $_POST["branchid"];
        $courseid = $_POST["courseid"];
        $batchid = $_POST["batchid"];
        $presentd = array();
        $datea = array();
        $daya = array();
        $houra = array();
        $TotStudents = array();
        $th="";
        $td="";
        $perpre = "";
        $A = array();
        $Studenttblbodypresent = "<table id='Studentpresent' class='table table-bordered dataTable no-footer '>
        <thead class = 'thead-present'><tr><th>DeptNo</th>";

        $Studenttblbody = "";
        $stdsql =   "SELECT deptno,name
                    FROM attendance a WHERE
                    date between '$from' AND '$to' AND a.branch = $branchid AND a.coursecode = $courseid AND a.batch = $batchid
                    GROUP BY student_id
                    ORDER BY student_rollno ASC";
        $querystd = $conn->query($stdsql)or die($conn->error);
        $studentNo = $querystd->num_rows;
        if($studentNo >0){
        // report common header
        $sql =  "SELECT MONTHNAME(date) AS Month,
                        branch.description as bdesc,
                        course.coursecode as ccd, 
                        users.firstname as ufn, 
                        users.lastname as uln,
                        course.description as ccdes,
                        schedules.hour as hhour,
                        day.description as dday,
                        a.hour as hourid,
                        day,course.semester as sem,date(date) AS AttdDate
                 FROM attendance a
                    LEFT JOIN branch on branch.id = a.branch
                    LEFT JOIN course on course.id = a.coursecode
                    LEFT JOIN users on users.id = a.user
                    LEFT JOIN schedules on schedules.id = a.hour
                    LEFT JOIN day on day.id = a.day
                 WHERE date between '$from' AND '$to' AND a.branch = $branchid AND a.coursecode = $courseid AND a.batch = $batchid
                 GROUP BY AttdDate";

            $query = $conn->query($sql)or die($conn->error);                
            $dateNo = $query->num_rows;
            $rowd = $query->fetch_assoc();
            if($rowd['sem'] == 6){$sem = 'VI';}
            else if($rowd['sem'] == 5){$sem = 'V';}
            else if($rowd['sem'] == 4){$sem = 'IV';}
            else if($rowd['sem'] == 3){$sem = 'III';}
            else if($rowd['sem'] == 2){$sem = 'II';}
            else if($rowd['sem'] == 1){$sem = 'I';}
            else {$sem = "";}
            //report header
            $RepHdrtblbody =    "<tr role='row'>
                                <td>".$rowd['Month']."</td>
                                <td>".$sem."</td> 
                                <td>".$rowd['bdesc']."</td>
                                <td>".$rowd['ccdes']."</td> 
                                <td>".$rowd['ccd']."</td>
                                <td>".$rowd['ufn']." ".$rowd['uln']."</td>
                                <td>".$dateNo."</td>
                                </tr>";
                $th ='<td class="dispdates"><span>'.$rowd['AttdDate'].'<br>'.$rowd['hhour'].'<br>'.$rowd['dday'].'</span></td>';
                $datea[] = $rowd['AttdDate'];
                $daya[] = $rowd['day'];
                $houra[] = $rowd['hourid'];$hhour ='';$day = '';
                while($prow = $query->fetch_assoc())
                {   
                    $date = $prow['AttdDate'];
                    $hhour = $prow['hhour'];
                    $day = $prow['dday'];
                    $hourid = $prow['hourid'];
                    $datea[] = $prow['AttdDate'];
                    $daya[] = $prow['day'];
                    $houra[] = $prow['hourid'];
                    //student table header
                    $th.= '<td class="dispdates"><span>'.$date.'<br>'.$hhour.'<br>'.$day.'</span></td>';
                }
                $th.= "<td>Present%</td></tr>";
                $Studenttblbodypresent.=$th."</thead>";

                while($prowstd = $querystd->fetch_assoc())
                {
                    //student list
                    //$Studenttblbody.= '<tr role="row"><td>'.$prowstd['deptno'].'</td><td>'.$prowstd['name'].'</td></tr>';
                    $TotStudents[] = $prowstd['deptno'];
                    $datei=$datea;
                    $dayi=$daya;
                    $houri=$houra;
                    $curStud = $prowstd['deptno'];

                    $countsql = "SELECT a.student_id as regno,
                    a.student_rollno AS rollno,
                    a.name,
                    a.deptno,
                    a.year,
                    branch.description as bdesc,
                    course.coursecode as ccd, 
                    users.firstname as ufn, 
                    users.lastname as uln,
                    course.description as ccdes 
                         , SUM(1)   AS tot
                         , SUM(a.present = 1) AS P
                         , SUM(a.present = 0 ) AS A 

                         , 100.0 
                         * SUM(a.present = 1)
                         / SUM(1) AS perpre

                         , 100.0 
                         * SUM(a.present = 0 )
                         / SUM(1) AS perabs 

                         FROM attendance a
                         LEFT JOIN branch on branch.id = a.branch
                         LEFT JOIN course on course.id = a.coursecode
                         LEFT JOIN users on users.id = a.user
                         where a.date BETWEEN '$from' AND '$to' AND
                         a.branch = $branchid and a.coursecode = $courseid and a.batch = $batchid 
                         AND a.active = 1 AND a.user = $usnid AND a.deptno = '$curStud'
                         GROUP BY a.student_id
                         ORDER BY a.student_rollno ASC";

                    $countquery = $conn->query($countsql);
                    $countrow = $countquery->fetch_assoc();


                    $perpre = $countrow['perpre'];
                    $h = array();
                    $da = array();
                    $d = array();
                    //$th = "";
                    $td = "<tr class='student'><th class = 'thead-present'>".$curStud."</th>";
                    for ($i=0;$i < $dateNo;$i++)
                        {
                            $h = $houri[$i];
                            $da = $datei[$i];
                            $d = $dayi[$i];
                            $b = $branchid;
                            $c = $courseid;
                            $ba = $batchid; 

                            $sqls = "SELECT *,deptno,AttdDate,p
                                        FROM
                                        (SELECT *,DAY(date) AS Day_c, 
                                        MONTHNAME(date) AS Month, 
                                        Year(date) AS Year_c,
                                        date(date) AS AttdDate,hour as h, day as dayorder,
                                        (CASE  WHEN present = 1 
                                            THEN ''
                                            WHEN present = 0 
                                            THEN 'A'
                                        END) AS p
                                        FROM attendance a 
                                        WHERE a.hour = $h AND a.date = '$da' AND a.day = '$d' AND a.branch = $b AND a.coursecode = $c 
                                        AND a.batch = $ba AND deptno = '$curStud'
                                        ORDER BY student_rollno ASC 
                                        )
                                        as report 
                                        LEFT JOIN schedules on schedules.id = report.hour
                                        ORDER BY Month DESC, Year_c DESC,student_rollno ASC,AttdDate ASC";

                                        $querys = $conn->query($sqls)or die($conn->error);
                                        while($prows = $querys->fetch_assoc())
                                        {   

                                            $td.= "<td>".$prows['p']."</td>";
                                        }


                        }
                        $td.="<td>".$perpre."</td></tr>";
                        $Studenttblbodypresent.= $td;
                }



                echo json_encode(array('RepHdrtblbody'=>$RepHdrtblbody,
                                        'present'=>$Studenttblbodypresent,
                                        ));

        }       
        else{
            echo "You have not given attendance";
        }
}
?>