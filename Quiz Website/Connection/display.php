<?php
    include('../Connection/connect.php');
    error_reporting(0);

    $query = "SELECT * FROM form";
    $data = mysqli_query($connect,$query);
    $total = mysqli_num_rows($data);

    // echo $total;

    if ($total !=0)
    {
        // echo "Record Present";
        ?>
        <h1 align="center">All Data / Records</h1>
        <table border="1" cellspacing="10" align="center">
            <tr>
                <th width="20%" align='center'>Enrollment</th>
                <th width="15%" align='center'>Date Of Birth</th>
                <th width="10%" align='center'>Branch</th>
                <th width="18%" align='center'>Year & Semester</th>
                <th width="8%" align='center'>Gender</th>
                <th width="20%" align='center'>Password</th>
            </tr>


        <?php
        while ($result = mysqli_fetch_assoc($data))
        {
            echo "<tr>
                    <td align='center'>".$result['Enrollment']."</td>
                    <td align='center'>".$result['Date_Of_Birth']."</td>
                    <td align='center'>".$result['Branch']."</td>
                    <td align='center'>".$result['Year_Semester']."</td>
                    <td align='center'>".$result['Gender']."</td>
                    <td align='center'>".$result['Password_']."</td>
                </tr>";
        }
    }
    else
    {
        // echo "No Record Present";
    }
?>

 </table>

