<!DOCTYPE>
<html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Character Certificate</title>


</head>
<style type="text/css">
	@media print {
		body * {
			visibility: hidden;
		}

		#printcontent * {
			visibility: visible;
		}

		#printcontent {
			position: absolute;
			top: 40px;
			left: 30px;
		}
	}

	.button {
		background-color: #4CAF50;
		/* Green */
		border: none;
		color: white;
		padding: 16px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		-webkit-transition-duration: 0.4s;
		/* Safari */
		transition-duration: 0.4s;
		cursor: pointer;
	}


	.button2 {
		background-color: #008CBA;
		color: white;
		border: 2px solid #008CBA;
	}

	.button2:hover {
		background-color: #4CAF50;
		color: white;
		border: 2px solid #4CAF50;
	}
</style>




<style type="text/css">
	.header {
		border: 3px solid #000;
		margin-bottom: 30px;
	}

	table h1,
	h2,
	h3 {
		font-family: Arial, Helvetica, sans-serif;
		line-height: 20px;
		margin: 10px;
	}

	.tcbody {
		font-family: Verdana, Geneva, sans-serif;
		font-style: italic;
		font-stretch: expanded;
		line-height: 30px;
		text-align: justify;
	}

	.main {
		width: 800px;
		margin: auto;
	}
</style>

<body>
	<div id="printcontent" class="container">
		<div id="page-wrap">

			<table style="width: 100%; padding-top:10px; padding-bottom:10px;margin-bottom: 15px; ">
				<tr style="color:#002D65;">
					<td width="10%" style="border: none;margin-left: 50px;">
						{{-- <img src="schoolo logo" alt="" width="80" /> --}}

                        <?php $image_path = '/admin_assets/school_logo/'.$getstudentDetails['getschooldata']['getschooldat']['logo_image']; ?>
                        <img src="{{ public_path() . $image_path }}" width="200" height="100">
					</td>
					<td style="border: none;">
						<h2 align="center" style="text-transform:uppercase;"><b>{{ $getstudentDetails['getschooldata']['getschooldat']['school_name'] }} </b></h2>

						<h4 align="center" style="font-variant:small-caps;">
							{{ $getstudentDetails['getschooldata']['getschooldat']['school_address']}}
						</h4>
						<h4 align="center" style="font-variant:small-caps;">
                            {{ $getstudentDetails['getschooldata']['getschooldat']['email']}} <br>{{ $getstudentDetails['getschooldata']['getschooldat']['mobile_no']}}

						</h4>
					</td>
				</tr>

			</table>
			<div class="row">
				<div class="col-md-12">
					<center><span
							style="font-size:20px;letter-spacing: 2px;border-radius: 25px;border: 2px solid #002D65;padding: 10px;width: 250px;color:white;background-color:#002D65;">
							<b>CHARACTER CERTIFICATE</b></span></center>
				</div>
			</div>


			</br></br>


			<div class="tcbody">
				<div>
					This is to certify that <strong>{{ $getstudentDetails['student']['s_name'] }}</strong>, S/O / D/O <strong>{{ $getstudentDetails['student']['father_name'] }}</strong>
					of <strong>{{ $getstudentDetails['student']['s_address'] }}</strong>. He had
					been studying in this school. So for as I know, he is a child of moral and character . He did not
					take part in any activity subversive to the state. I wish him every success.

				</div>
				<div>
					<br />
				</div>
				<div>a. His moral character : Good</div>
				<div>b. Behavior : Good</div>
				<div>c. Progress : Satisfactory</div>
				<div>
					<br />
				</div>

				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td valign="top" width="275">
								<div align="center">
									<br />
								</div>
							</td>
							<td valign="top" width="369">
								<div align="center"></div>
								<div align="center">Principal</div>
								<div align="center"></div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>



		</div>

	</div>

</body>


</html>