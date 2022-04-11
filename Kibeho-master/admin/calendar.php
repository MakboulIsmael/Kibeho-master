<?php $pagetitle = "Service Lookup";
$activecal='bg-indigo-800';
include_once("dashboard.php");
?>

<div class="container mx-auto px-4 flex items-center justify-center mt-5">
    <div class="flex-1  bg-indigo-600 py-4 px-4 items-center justify-center text-sm font-medium text-center rounded-xl shadow-lg text-white">
        <Span class=" font-medium lg:text-base text-base">Please fill all fields accordingly</Span><br>
        <form action="" method="POST">
            <table align="center" class="mt-5">
                <tr class="lg:block grid ">
                    <td><span class="lg:font-medium  lg:text-base">Service Date</span></td>
                    <td><input type="text" id="datepicker" name="date" placeholder="Select Date here" class="p-2 rounded-lg text-center text-gray-600 m-2 w-full"></td>
                </tr>
                <tr class="lg:block grid">
                    <td> <span class="lg:font-medium  lg:text-base text-sm">Service Hour</span></td>
                    <td><select name="service" id="service" class="p-2 rounded-lg text-center text-gray-600 m-2 w-full " onclick="serviceForm();">
                            <option value="" disabled <?php echo $service == "" ? "selected" : ""; ?>>Service (Hitamo Misa)</option>
                            <option id="service-8" value="">MISA 1</option>
                            <option id="service-11" value="">MISA 2</option>
                            <option id="service-16" value="">MISA 3</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button id="submit" name="submit" type="submit" class="py-2 px-5 rounded-lg text-center m-2 mb-5 bg-indigo-900 hover:bg-indigo-400 font-medium ">Submit</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="lg:flex-1 lg:py-4  text-white text-sm font-medium lg:px-4 py-2 rounded-full lg:ml-10 ml-5 bg-indigo-600 px-2 items-center justify-center text-center shadow-lg">
        <span class="font-medium  text-2xl"><?php echo $countResult; ?></span>

    </div>
</div>

<!--Container-->
<div class="container w-full mt-5 mx-auto px-2">

	<!--Card-->
	<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-xl shadow-lg bg-white">
		<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
			<thead>
				<tr>
					<th data-priority="1">Name</th>
					<th data-priority="2">Phone</th>
					<th data-priority="3">Gender</th>
					<th data-priority="4">Date</th>
					<th data-priority="5">Service</th>
					<th data-priority="6">Diocese</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM users WHERE date='$date' AND service='$service'";
				$result = $connection->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while ($data = $result->fetch_assoc()) {
				?>
						<tr>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['phone']; ?></td>
							<td><?php echo $data['gender']; ?></td>
							<td><?php echo $data['date']; ?></td>
							<td><?php echo $data['service']; ?></td>
							<td><?php echo $data['diocese']; ?></td>
						</tr>
				<?php
					}
				} 
				?>

			</tbody>
		</table>
	</div>
	<!--/Card-->
</div>

<script>
	$(document).ready(function() {

		var table = $('#example').DataTable({
				responsive: true,
				dom: 'Bfrtip',
					buttons: ['excel','pdf'
					]
			})
			.columns.adjust()
			.responsive.recalc();

        var SelectedDates = {};
        SelectedDates[new Date('11/28/2021')] = new Date('11/28/2021').toString();
        SelectedDates[new Date('11/29/2021')] = new Date('11/29/2021').toString();
        $("#datepicker").datepicker({
            dateFormat: 'yy/mm/dd',
            beforeShowDay: nonWorkingDates,
            numberOfMonths: 1,
            minDate: '-6M',
            maxDate: '+3M',
            firstDay: 1,
        });

        function nonWorkingDates(date) {
            var Highlight = SelectedDates[date];
            if (Highlight) {
                return [true, "Highlighted", Highlight];
            } else {
                return [true, '', ''];
            }
        }
        // return [true];


    });

    function serviceForm() {
        var item = document.getElementById('datepicker').value;
        if (item == '2021/11/28') {
            misa1 = '8:00 AM';
            misa2 = '11:00 AM';
            misa3 = '4:00 PM';
        } else if (item == '2021/11/29') {
            misa1 = '7:00 AM';
            misa2 = '10:00 AM';
            misa3 = '1:00 PM';
        } else {
            misa1 = '7:00 AM';
            misa2 = '10:00 AM';
            misa3 = '4:00 PM'
        }
        document.getElementById('service-8').innerHTML = misa1;
        document.getElementById('service-11').innerHTML = misa2;
        document.getElementById('service-16').innerHTML = misa3;
        document.getElementById('service-8').value = misa1;
        document.getElementById('service-11').value = misa2;
        document.getElementById('service-16').value = misa3;


    }
</script>

