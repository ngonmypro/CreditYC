<?php 

	@session_start();
	
	include "../../../Connections/connect_mysql.php";

	//$emp_id_add = $_SESSION['emp_id'];
	//$emp_add = $_SESSION['emp_begin_name'] & " " & $_SESSION['emp_firstname'] & " " & $_SESSION['emp_lastname'];

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
.notes {
    background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-size: 100% 100%, 100% 100%, 100% 31px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    line-height: 31px;
    font-family: Arial, Helvetica, Sans-serif;
    padding: 8px;
}

.notes:focus {
    outline: none;
}

.pointer {cursor: pointer;}
</style>
<script type="text/javascript">
	$(document).ready(function(){
$("#a04").hide();
$("#a16").hide();
$("#a17").hide();
$("#a18").hide();
$("#a19").hide();
$("#a20").hide();
$("#a21").hide();
$("#a22").hide();
$("#a23").hide();
$("#a24").hide();
$("#a28").hide();
$("#a31").hide();
$("#form2").hide();
$("#form3").hide();

    $("#open_type").change(function() {
        $.post("requester/opencd/process/chk_typeopen.php",
          {
              pro : $('#open_type').val()
          },
          function(data){
            //alert(data);
            if (data == 1) {
              //alert("data");
              $("#a04").show();
            }else {
              $("#a04").hide();
            }
          });
      });

      $("#open_busiprovin").change(function() {
          $.post("requester/opencd/process/chk_amphur.php",
            {
                pro : $('#open_busiprovin').val()
            },
            function(data){
            $("#open_busiamphur").html(data);
            });
        });

        $("#open_busiamphur").change(function() {
            $.post("requester/opencd/process/chk_district.php",
              {
                  pro : $('#open_busiamphur').val()
              },
              function(data){
              $("#open_busidistrict").html(data);
              });
          });

          $("#open_busidistrict").change(function() {
              $.post("requester/opencd/process/chk_zipcode.php",
                {
                    pro : $('#open_busidistrict').val()
                },
                function(data){
                $("#open_busizipcode").html(data);
                });
            });

            $("#open_typeproject2").click(function() {
                $.post("requester/opencd/process/chk_typeproject.php",
                  {
                      pro : $('#open_typeproject2').val()
                  },
                  function(data){
                    if (data == 1) {
                      $("#a16").show();
											$("#a17").show();
											$("#a18").show();
											$("#a19").show();
											$("#a20").show();
											$("#a21").show();
											$("#a22").show();
											$("#a23").show();
                    }else {
                      $("#a16").hide();
											$("#a17").hide();
											$("#a18").hide();
											$("#a19").hide();
											$("#a20").hide();
											$("#a21").hide();
											$("#a22").hide();
											$("#a23").hide();
                    }
                  });
              });

              $("#open_typeproject1").click(function() {
                  $.post("requester/opencd/process/chk_typeproject.php",
                    {
                        pro : $('#open_typeproject1').val()
                    },
                    function(data){
                      if (data == 0) {
                        //alert("data");
                        $("#a16").hide();
												$("#a17").hide();
												$("#a18").hide();
												$("#a19").hide();
												$("#a20").hide();
												$("#a21").hide();
												$("#a22").hide();
												$("#a23").hide();
                      }else {
												$("#a16").show();
												$("#a17").show();
												$("#a18").show();
												$("#a19").show();
												$("#a20").show();
												$("#a21").show();
												$("#a22").show();
												$("#a23").show();
                      }
                    });
                });

								$("#project_type").change(function() {
						        $.post("requester/opencd/process/chk_typepro.php",
						          {
						              pro : $('#project_type').val()
						          },
						          function(data){
						            //alert(data);
						            if (data == 1) {
						              //alert("data");
						              $("#a24").show();
						            }else {
						              $("#a24").hide();
						            }
						          });
						      });

									$("#pay_type").change(function() {
							        $.post("requester/opencd/process/chk_typepay.php",
							          {
							              pro : $('#pay_type').val()
							          },
							          function(data){
							            if (data == 1) {
							              $("#a28").show();
							            }else {
							              $("#a28").hide();
							            }
							          });
							      });

										$("#billing2").click(function() {
				                $.post("requester/opencd/process/chk_billing.php",
				                  {
				                      pro : $('#billing2').val()
				                  },
				                  function(data){
				                    if (data == 1) {
				                      $("#a31").show();
				                    }else {
				                      $("#a31").hide();
				                    }
				                  });
				              });

				              $("#billing1").click(function() {
				                  $.post("requester/opencd/process/chk_billing.php",
				                    {
				                        pro : $('#billing1').val()
				                    },
				                    function(data){
				                      if (data == 0) {
				                        $("#a31").hide();
				                      }else {
																$("#a31").show();
				                      }
				                    });
				                });

// Chk validate
					//รหัสลูกค้า
			$('#customer_code').blur(function() {
					if($('#customer_code').val().length==0){
						//
					}else{
						$('#a01').addClass('has-success');
					}
				});
				$('#open_date').blur(function() {
						if($('#open_date').val().length==0){
							//
						}else{
							$('#a02').addClass('has-success');
						}
					});
				// ประเภทการขอเปิด
				$('#open_type').blur(function() {
						if($('#open_type').val().length==0){
							//
						}else{
							$('#a03').addClass('has-success');
						}
					});
				$('#open_other').blur(function() {
						if($('#open_other').val().length==0){
							//
						}else{
							$('#a04').addClass('has-success');
						}
					});

					// ชื่อกิจการ
				$('#open_businame').blur(function() {
						if($('#open_businame').val().length==0){
							$('#a05').addClass('has-error');
							$('#amsg5').html('ชื่อกิจการ ต้องไม่เป็นค่าว่าง!');
							$('#open_businame').focus();
						}else{
							$('#a05').removeClass('has-error');
							$('#a05').addClass('has-success');
							$('#amsg5').html('');
						}
					});
						// ที่อยู่
					$('#open_busiloca').blur(function() {
							if($('#open_busiloca').val().length==0){
								$('#a06').addClass('has-error');
								$('#amsg6').html('ที่อยู่ ต้องไม่เป็นค่าว่าง!');
								$('#open_busiloca').focus();
							}else{
								$('#a06').removeClass('has-error');
								$('#a06').addClass('has-success');
								$('#amsg6').html('');
							}
						});
						// หมู่ที่
					$('#open_busiswine').blur(function() {
							if($('#open_busiswine').val().length==0){
								//
							}else{
								$('#a07').addClass('has-success');
							}
						});
						// ถนน
					$('#open_busiroad').blur(function() {
							if($('#open_busiroad').val().length==0){
								//
							}else{
								$('#a08').addClass('has-success');
							}
						});
						// ตรอก/ซอย
					$('#open_busialley').blur(function() {
							if($('#open_busialley').val().length==0){
								//
							}else{
								$('#a09').addClass('has-success');
							}
						});
						// จังหวัด
					$('#open_busiprovin').blur(function() {
							if($('#open_busiprovin').val().length==0){
								//
							}else{
								$('#a10').addClass('has-success');
							}
						});
						// อำเภอ
					$('#open_busiamphur').blur(function() {
							if($('#open_busiamphur').val().length==0){
								//
							}else{
								$('#a11').addClass('has-success');
							}
						});
						// ตำบล
					$('#open_busidistrict').blur(function() {
							if($('#open_busidistrict').val().length==0){
								//
							}else{
								$('#a12').addClass('has-success');
							}
						});
						// รหัรหัสไปรษณีย์
					$('#open_busizipcode').blur(function() {
							if($('#open_busizipcode').val().length==0){
								//
							}else{
								$('#a13').addClass('has-success');
							}
						});
						// เบอร์โทรศัพท์
					$('#open_phone').blur(function() {
							if($('#open_phone').val().length==0){
								$('#a14').addClass('has-error');
								$('#amsg14').html('เบอร์โทรศัพท์ ต้องไม่เป็นค่าว่าง!');
								$('#open_phone').focus();
							}else{
								$('#a14').removeClass('has-error');
								$('#a14').addClass('has-success');
								$('#amsg14').html('');
							}
						});
						// เบอร์แฟกซ์
					$('#open_fax').blur(function() {
							if($('#open_fax').val().length==0){
								//
							}else{
								$('#a15').addClass('has-success');
							}
						});
						// ชื่อโครงการ
					$('#open_nameproject').blur(function() {
							if($('#open_nameproject').val().length==0){
								//
							}else{
								$('#a16').addClass('has-success');
							}
						});
						// ที่ตั้งโครงการ
					$('#open_locaproject').blur(function() {
							if($('#open_locaproject').val().length==0){
								//
							}else{
								$('#a17').addClass('has-success');
							}
						});
						//ระยะเวลาสัญญา
					$('#open_dateproject').blur(function() {
							if($('#open_dateproject').val().length==0){
								//
							}else{
								$('#a18').addClass('has-success');
							}
						});
						//วันที่เริ่มก่อสร้าง
					$('#open_dateprostart').blur(function() {
							if($('#open_dateprostart').val().length==0){
								//
							}else{
								$('#a19').addClass('has-success');
							}
						});
						//วันที่จบโครงการ
					$('#open_dateproend').blur(function() {
							if($('#open_dateproend').val().length==0){
								//
							}else{
								$('#a20').addClass('has-success');
							}
						});
						//มูลค่าโครงการ
					$('#open_promon').blur(function() {
							if($('#open_promon').val().length==0){
								//
							}else{
								$('#a21').addClass('has-success');
							}
						});
						//เริ่มใช้สินค้า
					$('#proget_start').blur(function() {
							if($('#proget_start').val().length==0){
								//
							}else{
								$('#a22').addClass('has-success');
							}
						});
						//ประเภทงานก่อสร้าง
					$('#project_type').blur(function() {
							if($('#project_type').val().length==0){
								//
							}else{
								$('#a23').addClass('has-success');
							}
						});
						//ประเภทอื่นๆ
					$('#project_other').blur(function() {
							if($('#project_other').val().length==0){
								//
							}else{
								$('#a24').addClass('has-success');
							}
						});
						//ซื้อเฉลี่ย/เดือน
					$('#project_averagebuy').blur(function() {
							if($('#project_averagebuy').val().length==0){
								//
							}else{
								$('#a25').addClass('has-success');
							}
						});
						//ซื้อรวม/ปี
					$('#project_buytotal').blur(function() {
							if($('#project_buytotal').val().length==0){
								//
							}else{
								$('#a26').addClass('has-success');
							}
						});
						//การชำระค่าสินค้า
					$('#pay_type').blur(function() {
							if($('#pay_type').val().length==0){
								//
							}else{
								$('#a27').addClass('has-success');
							}
						});
						//จ่ายช่องทางอื่น
					$('#pay_other').blur(function() {
							if($('#pay_other').val().length==0){
								//
							}else{
								$('#a28').addClass('has-success');
							}
						});
						//กำหนดชำระเงินเครดิต
					$('#pay_deadline').blur(function() {
							if($('#pay_deadline').val().length==0){
								//
							}else{
								$('#a29').addClass('has-success');
							}
						});
						//สถานที่วางบิล
					$('#pay_locabill').blur(function() {
							if($('#pay_locabill').val().length==0){
								//
							}else{
								$('#a30').addClass('has-success');
							}
						});
						//เงื่เงื่อนไขอื่น
					$('#billing_other').blur(function() {
							if($('#billing_other').val().length==0){
								//
							}else{
								$('#a31').addClass('has-success');
							}
						});
						//ร้านที่เคยติดต่อ
					$('#contacted_open').blur(function() {
							if($('#contacted_open').val().length==0){
								//
							}else{
								$('#a32').addClass('has-success');
							}
						});
						//สินค้า
					$('#product_open').blur(function() {
							if($('#product_open').val().length==0){
								//
							}else{
								$('#a33').addClass('has-success');
							}
						});
						//วงเงิน
					$('#product_mon').blur(function() {
							if($('#product_mon').val().length==0){
								//
							}else{
								$('#a34').addClass('has-success');
							}
						});
						//เครดิต
					$('#product_credit').blur(function() {
							if($('#product_credit').val().length==0){
								//
							}else{
								$('#a35').addClass('has-success');
							}
						});
						//ธนาคารที่ติดต่อ
					$('#bank_open').blur(function() {
							if($('#bank_open').val().length==0){
								//
							}else{
								$('#a36').addClass('has-success');
							}
						});
						//สาขา
					$('#bankbran_open').blur(function() {
							if($('#bankbran_open').val().length==0){
								//
							}else{
								$('#a37').addClass('has-success');
							}
						});
						//เลขที่บัญชี
					$('#booknum_open').blur(function() {
							if($('#booknum_open').val().length==0){
								//
							}else{
								$('#a38').addClass('has-success');
							}
						});
						//คำนำหน้าชื่อ
					$('#cus_tit').blur(function() {
							if($('#cus_tit').val().length==0){
								//
							}else{
								$('#a39').addClass('has-success');
							}
						});
						//ชื่อ
					$('#cus_name').blur(function() {
							if($('#cus_name').val().length==0){
								$('#a40').addClass('has-error');
								$('#amsg40').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
								$('#cus_name').focus();
							}else{
								$('#a40').removeClass('has-error');
								$('#a40').addClass('has-success');
								$('#amsg40').html('');
							}
						});
						//นามสกุล
					$('#cus_lname').blur(function() {
							if($('#cus_lname').val().length==0){
								$('#a41').addClass('has-error');
								$('#amsg41').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
								$('#cus_lname').focus();
							}else{
								$('#a41').removeClass('has-error');
								$('#a41').addClass('has-success');
								$('#amsg41').html('');
							}
						});
						//ตำแหน่ง
					$('#cus_position').blur(function() {
							if($('#cus_position').val().length==0){
								//
							}else{
								$('#a42').addClass('has-success');
							}
						});
						//แผนก/ฝ่าย
					$('#cus_department').blur(function() {
							if($('#cus_department').val().length==0){
								//
							}else{
								$('#a43').addClass('has-success');
							}
						});
						//พนัพนักงานขาย
					$('#sale_name').blur(function() {
							if($('#sale_name').val().length==0){
								//
							}else{
								$('#a44').addClass('has-success');
							}
						});
						//สาขา
					$('#sale_branch').blur(function() {
							if($('#sale_branch').val().length==0){
								//
							}else{
								$('#a45').addClass('has-success');
							}
						});
						//ความคิดแห็น
					$('#sale_comment').blur(function() {
							if($('#sale_comment').val().length==0){
								//
							}else{
								$('#a46').addClass('has-success');
							}
						});
						//เลขบัตรประชาชน/เลขผู้เสียภาษี
					$('#cus_idcard').blur(function() {
							if($('#cus_idcard').val().length==0){
								$('#a47').addClass('has-error');
								$('#amsg47').html('เลขบัตรประชาชน/เลขผู้เสียภาษี ต้องไม่เป็นค่าว่าง!');
								$('#cus_idcard').focus();
							}else if ($('#cus_idcard').val().match(/^([0-9]){13}$/)){
								$('#a47').removeClass('has-error');
								$('#a47').addClass('has-success');
								$('#amsg47').html('');
							}else{
								$('#a47').addClass('has-error');
								$('#amsg47').html('ตัวเลข ความยาวระหว่าง 13 ตัวอักษร!');
								$('#cus_idcard').focus();
							}
						});

						//เบอร์โทรผู้ติดต่อ
					$('#cus_phonecus').blur(function() {
							if($('#cus_phonecus').val().length==0){
								$('#a48').addClass('has-error');
								$('#amsg48').html('เบอร์โทรศัพท์ผู้ติดต่อ ต้องไม่เป็นค่าว่าง!');
								$('#cus_phonecus').focus();
							}else{
								$('#a48').removeClass('has-error');
								$('#a48').addClass('has-success');
								$('#amsg48').html('');
							}
						});

						// Email
						$('#cus_email').blur(function() {
								if($('#cus_email').val().length==0){
									$('#a49').addClass('has-error');
									$('#amsg49').html('Email ต้องไม่เป็นค่าว่าง!');
									$('#cus_email').focus();
								}else if ($('#cus_email').val().match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]$/)){
									$('#a49').removeClass('has-error');
									$('#a49').addClass('has-success');
									$('#amsg49').html('');
								}else{
									$('#a49').addClass('has-error');
									$('#amsg49').html('ต้องกรอกเป็น Email *admin@gmail.com*');
									$('#cus_email').focus();
								}
							});
							
						//consideration เขตการพิจารณา
						$('#consideration').blur(function() { 
							if($('#consideration').val()==0){
								$('#a67').addClass('has-error');
								$('#amsgconsid').html('เขตการพิจารณา เป็นค่าว่างไม่ได้');
								$('#consideration').focus();	
							}else{
								$('#a67').removeClass('has-error');
								$('#a67').addClass('has-success');
								$('#amsgconsid').html('');	
							}
						});
						
						//คำนำหน้า 
						$('#cus_tit').blur(function() { 
							if($('#cus_tit').val()==0){
								$('#a39').addClass('has-error');
								$('#amsgtit').html('คำนำหน้า เป็นค่าว่างไม่ได้');
								$('#cus_tit').focus();	
							}else{
								$('#a39').removeClass('has-error');
								$('#a39').addClass('has-success');
								$('#amsgtit').html('');
							}
						});
							//Line
							$('#cus_line').blur(function() {
									if($('#cus_line').val().length==0){
										//
									}else{
										$('#a50').addClass('has-success');
									}
								});
								//Facebook
								$('#cus_face').blur(function() {
										if($('#cus_face').val().length==0){
											//
										}else{
											$('#a51').addClass('has-success');
										}
									});

									//กรรมการบริษัทคนที่1
									$('#tit1').blur(function() {
											if($('#tit1').val().length==0){
												//
											}else{
												$('#a52').addClass('has-success');
											}
										});

										$('#name1').blur(function() {
												if($('#name1').val().length==0){
													//
												}else{
													$('#a53').addClass('has-success');
												}
											});

											$('#lname1').blur(function() {
													if($('#lname1').val().length==0){
														//
													}else{
														$('#a54').addClass('has-success');
													}
												});

												$('#idcard1').blur(function() {
														if($('#idcard1').val().length==0){
															$("#form2").hide();
															$("#form3").hide();
														}else{
															$("#form2").show();
															$('#a55').addClass('has-success');
														}
													});

												$('#position1').blur(function() {
													if($('#position1').val().length==0){
														//
													}else{
														$('#a56').addClass('has-success');
													}
												});

												//กรรมการบริษัทคนที่2
												$('#tit2').blur(function() {
														if($('#tit2').val().length==0){
															//
														}else{
															$('#a57').addClass('has-success');
														}
													});

													$('#name2').blur(function() {
															if($('#name2').val().length==0){
																//
															}else{
																$('#a58').addClass('has-success');
															}
														});

														$('#lname2').blur(function() {
																if($('#lname2').val().length==0){
																	//
																}else{
																	$('#a59').addClass('has-success');
																}
															});

															$('#idcard2').blur(function() {
																	if($('#idcard2').val().length==0){
																		$("#form3").hide();
																	}else{
																		$("#form3").show();
																		$('#a60').addClass('has-success');
																	}
																});

															$('#position2').blur(function() {
																if($('#position2').val().length==0){
																	//
																}else{
																	$('#a61').addClass('has-success');
																}
															});

															//กรรมการบริษัทคนที่3
															$('#tit3').blur(function() {
																	if($('#tit3').val().length==0){
																		//
																	}else{
																		$('#a62').addClass('has-success');
																	}
																});

																$('#name3').blur(function() {
																		if($('#name3').val().length==0){
																			//
																		}else{
																			$('#a63').addClass('has-success');
																		}
																	});

																	$('#lname3').blur(function() {
																			if($('#lname3').val().length==0){
																				//
																			}else{
																				$('#a64').addClass('has-success');
																			}
																		});
																	$('#idcard3').blur(function() {
																			if($('#idcard3').val().length==0){
																				//
																			}else{
																				$('#a65').addClass('has-success');
																			}
																		});

																		$('#position3').blur(function() {
																			if($('#position3').val().length==0){
																				//
																			}else{
																				$('#a66').addClass('has-success');
																			}
																		});

																		$('#consideration').blur(function() {
																			if($('#consideration').val().length==0){
																				//
																			}else{
																				$('#a67').addClass('has-success');
																			}
																		});

																		$('#sale_name_cus').blur(function() {
																			if($('#sale_name_cus').val().length==0){
																				//
																			}else{
																				$('#a68').addClass('has-success');
																			}
																		});

																		$('#sale_branch_cus').blur(function() {
																			if($('#sale_branch_cus').val().length==0){
																				//
																			}else{
																				$('#a69').addClass('has-success');
																			}
																		});

  });
  
function treatAsUTC(date) {
    var result = new Date(date);
    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
    return result;
}

function daysBetween(startDate, endDate) {
    var millisecondsPerDay = 24 * 60 * 60 * 1000;
    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
}


  
function cald1(){
	if($('#open_dateprostart').val()){
		if($('#open_dateproend').val()){
			if($('#open_dateprostart').val()<$('#open_dateproend').val()){
				//alert(daysBetween($('#open_dateprostart').val(), $('#open_dateproend').val()));
				var datep = daysBetween($('#open_dateprostart').val(), $('#open_dateproend').val());
				//open_dateproend//open_dateprostart//open_dateproject
				$("#open_dateproject").val(datep);
			}else{
				BootstrapDialog.alert("กรุณาเลือกวันที่ให้เหมาะสม วันที่เริ่ม ควรจะน้อยกว่า วันที่ สิ้นสุด");
				$('#open_dateprostart').val("");
				$('#open_dateproend').val("");
				$("#open_dateproject").val(0);
				$('#open_dateprostart').focus();
			}
		}
	}
}
</script>
</head>

<body>
	<form id="addreqfrm" name="addreqfrm">
		<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">ใบขอเปิดวงเงินเครดิตหน้าแรก</a></li>
    <li><a data-toggle="tab" href="#menu2">ใบขอเปิดวงเงินเครดิตหน้าที่ 5</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <div class="row">
        <div class="col-md-3">
            <div id="a01" class="form-group">
                <label>รหัสลูกค้า</label>
                  <input type='text' class="form-control border-input" id="customer_code" placeholder="Customer code">
            </div>
        </div>
      </div>
			<div class="row">
        <div class="col-md-3">
            <div id="a02" class="form-group">
                <label>วันที่ *</label>
                  <input type='text' class="form-control border-input" id="open_date" placeholder="Submit Date" />
              </div>
          </div>
          <script type="text/javascript">
               $("#open_date").datepicker({
                  dateFormat: 'yy-mm-dd'
               });
          </script>
          <div class="col-md-3">
            <div id="a03" class="form-group">
                <label>ประเภทกิจการ *</label>
                <select class="form-control" id="open_type">
                    <option value="0"> # ประเภทกิจการ # </option>
                    <?php $sqlopen = 'SELECT * FROM tbltypeopen';
                          $resultopen = mysql_query($sqlopen) or die(mysql_error());
                          while ($rowopen = mysql_fetch_array($resultopen)) { ?>
                    <option value="<?php echo $rowopen['open_id']; ?>" ><?php echo $rowopen['open_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
          </div>
          <div class="col-md-6">
            <div id="a04" class="form-group">
                <label>ประเภทกิจการอื่นๆ</label>
                  <input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="open_other">
            </div>
          </div>
			</div>
      <div class="row">
        <div class="col-md-6">
          <div id="a05" class="form-group">
              <label>ชื่อกิจการ/หน่วยงานที่จดทะเบียน *</label>
                <input type="text" class="form-control border-input" placeholder="Business Name" id="open_businame">
                <small id="amsg5" class="form-text text-muted" style="color:#F30;"></small>
          </div>
        </div>
        <div class="col-md-3">
            <div id="a06" class="form-group">
              <label>สำนักงานที่ตั้ง *</label>
              <input type="text" class="form-control border-input" placeholder="Business Location" id="open_busiloca">
              <small id="amsg6" class="form-text text-muted" style="color:#F30;"></small>
            </div>
        </div>
        <div class="col-md-3">
            <div id="a07" class="form-group">
              <label>หมู่ที่ *</label>
              <input type="text" class="form-control border-input" placeholder="Business Swine" id="open_busiswine">
              <small id="amsg7" class="form-text text-muted" style="color:#F30;"></small>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-3">
						<div id="a08" class="form-group">
            	<label>ถนน *</label>
            	<input type="text" class="form-control border-input" placeholder="Business Road" id="open_busiroad">
          	</div>
					</div>
          <div class="col-md-3">
						<div id="a09" class="form-group">
            	<label>ตรอก/ซอย *</label>
            	<input type="text" class="form-control border-input" placeholder="Business Alley" id="open_busialley">
	            <small id="" class="form-text text-muted" style="color:#F30;"></small>
						</div>
					</div>
          <div class="col-md-3">
						<div id="a10" class="form-group">
            <label>จังหวัด *</label>
            <select class="form-control" id="open_busiprovin">
                <option value="0"> # จังหวัด # </option>
                <?php $sqlprovi = 'SELECT * FROM province ORDER BY PROVINCE_NAME ASC';
                      $resultprovi = mysql_query($sqlprovi) or die(mysql_error());
                      while ($rowprovi = mysql_fetch_array($resultprovi)) { ?>
                <option value="<?php echo $rowprovi['PROVINCE_ID']; ?>" ><?php echo $rowprovi['PROVINCE_NAME']; ?></option>
                <?php } ?>
            </select>
					</div>
				</div>
          <div class="col-md-3">
						<div id="a11" class="form-group">
            <label>อำเภอ *</label>
            <select class="form-control" id="open_busiamphur">
                <option value="0"> # อำเภอ # </option>
            </select>
					</div>
				</div>
      </div>
      <div class="row">
        <div class="col-md-3">
					<div id="a12" class="form-group">
          <label>ตำบล *</label>
          <select class="form-control" id="open_busidistrict">
              <option value="0"> # ตำบล # </option>
          </select>
				</div>
			</div>
        <div class="col-md-3">
					<div id="a13" class="form-group">
          <label>รหัสไปรษณีย์ *</label>
          <select class="form-control" id="open_busizipcode">
              <option value="0"> # รหัสไปรษณีย์ # </option>
          </select>
							<!--<img class="pointer" src="images/details_open.png" width="16" height="16" onMouseOver="changeCursor(this,'pointer');" onClick="javascript:addzipcode();">
							<c style="color:RED;">เพิ่มรหัสไปรษณีย์ใหม่</c>-->
				</div>
			</div>
        <div class="col-md-3">
					<div id="a14" class="form-group">
          <label>เบอร์โทรศัพท์บริษัท *</label>
          <input type="text" class="form-control border-input" placeholder="Telephone" id="open_phone">
          <small id="amsg14" class="form-text text-muted" style="color:#F30;"></small>
				</div>
			</div>
        <div class="col-md-3">
					<div id="a15" class="form-group">
          <label>แฟกซ์บริษัท</label>
          <input type="text" class="form-control border-input" placeholder="Fax" id="open_fax">
				</div>
			</div>
      </div>
      <div class="row">
        <div class="col-md-6">
					<div class="form-group">
          <label><u>มีความประสงค์ขอเปิดวงเงินเครดิต กับบริษัทฯ เพื่อวัตถุประสงค์ดังนี้</u></label>
        <form>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="1" id="open_typeproject1"><b>นำสินค้าไปจำหน่าย (ร้านค้า)</b>
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="2" id="open_typeproject2"><b>ใช้กับการก่อสร้างหน่วยงาน/</b>
          </label>
        </form>
			</div>
		</div>
      <div class="col-md-6" id="a16">
				<div id="a16" class="form-group">
        	<label>โครงการชื่อ</label>
        	<input type="text" class="form-control border-input" placeholder="Project Name" id="open_nameproject">
				</div>
			</div>
    </div>
      <div class="row">
				<div class="col-md-12" id="a17">
					<div id="a17" class="form-group">
						<label>ที่ตั้ง</label>
						<input type="text" class="form-control border-input" placeholder="Project Location" id="open_locaproject">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4" id="a18">
					<div id="a18" class="form-group">
						<label>ระยะเวลาสัญญา/ก่อสร้าง</label>
						<form class="form-inline">
							<input type="number" class="form-control border-input" placeholder="Project Limitday" id="open_dateproject" disabled><b> วัน</b>
						</form>
					</div>
				</div>
				<div class="col-md-4" id="a19">
					<div id="a19" class="form-group">
						<label>วันที่เริ่มต้น</label>
						<input type="text" class="form-control border-input" onChange="javascript:cald1();" placeholder="Project Date Start" id="open_dateprostart">
					</div>
				</div>
				<script type="text/javascript">
						 $("#open_dateprostart").datepicker({
								dateFormat: 'yy-mm-dd'
						 });
				</script>
				<div class="col-md-4" id="a20">
					<div id="a20" class="form-group">
						<label>สิ้นสุด</label>
									<input type='text' class="form-control border-input" onChange="javascript:cald1();" placeholder="Project Date End" id="open_dateproend">
							</div>
				</div>
					<script type="text/javascript">
							 $("#open_dateproend").datepicker({
									dateFormat: 'yy-mm-dd'
							 });
					</script>
				</div>
			<div class="row">
				<div class="col-md-4" id="a21">
					<div id="a21" class="form-group">
						<label>เป็นมูลค่า</label>
					<form class="form-inline">
						<input type="text" min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Project Value" id="open_promon"><b> บาท</b>
					</form>
					</div>
				</div>
				<div class="col-md-4" id="a22">
	            <div id="a22" class="form-group">
	                <label>เริ่มใช้สินค้า (ป/ด/ว)</label>
	                  <input type='text' class="form-control border-input" placeholder="Project Get Started" id="proget_start">
	              </div>
	        </div>
	          <script type="text/javascript">
	               $("#proget_start").datepicker({
	                  dateFormat: 'yy-mm-dd'
	               });
	          </script>
				</div>
			<div class="row" id="a23">
					<div class="col-md-4">
							<label>รายละเอียดของงานก่อสร้าง/โครงการ</label>
							<div id="a23" class="form-group">
	                <select class="form-control" id="project_type">
	                    <option value="0"> # ประเภทงานก่อสร้าง # </option>
	                    <?php $sqlcont = 'SELECT * FROM tbltypeconstruct';
	                          $resultcont = mysql_query($sqlcont) or die(mysql_error());
	                          while ($rowcont = mysql_fetch_array($resultcont)) { ?>
	                    <option value="<?php echo $rowcont['cont_id']; ?>" ><?php echo $rowcont['cont_name']; ?></option>
	                    <?php } ?>
	                </select>
	              </div>
					</div>
					<div class="col-md-8">
            <div id="a24" class="form-group">
                <label>ประเภทงานก่อสร้างอื่นๆ</label>
                  <input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="project_other">
            </div>
          </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="a25" class="form-group">
							<label>ประมาณการซื้อเฉลี่ย ต่อเดือน</label>
								<input type="text"  min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Average Buy" id="project_averagebuy">
					</div>
				</div>
				<div class="col-md-6">
					<div id="a26" class="form-group">
							<label>ประมาณการซื้อรวมต่อปี</label>
								<input type="text"  min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Buy Total" id="project_buytotal">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
							<label><u>สถานที่ส่งสินค้า</u></label>
							<form>
			          <label class="radio-inline">
			            <input type="radio" name="optradio" value="1" id="delivery1"><b>สำนักงานใหญ่ ตามที่อยู่ข้างต้น</b>
			          </label>
			          <label class="radio-inline">
			            <input type="radio" name="optradio" value="2" id="delivery2"><b>กรณีที่อยู่ไม่ตรงกับสำนักงานใหญ่ ให้แนบใบแจ้งสถานที่ส่งสินค้า</b>
			          </label>
			        </form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label><u>ข้อมูลการชำระเงิน / วางบิล / เอกสารใบกำกับภาษี</u></label>
				</div>
					<div class="col-md-4">
					<div id="a27" class="form-group">
						<label>การชำระค่าสินค้า</label>
							<select class="form-control" id="pay_type">
									<option value="0"> # การชำระค่าสินค้า # </option>
									<?php $sqlpay = 'SELECT * FROM tbltypepayment';
												$resultpay = mysql_query($sqlpay) or die(mysql_error());
												while ($rowpay = mysql_fetch_array($resultpay)) { ?>
									<option value="<?php echo $rowpay['pay_id']; ?>" ><?php echo $rowpay['pay_name']; ?></option>
									<?php } ?>
							</select>
						</div>
				</div>
				<div class="col-md-8">
					<div id="a28" class="form-group">
							<label>การชำระค่าสินค้าทางอื่นๆ</label>
								<input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="pay_other">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4" id="">
					<div id="a29" class="form-group">
						<label>กำหนดชำระเงินเครดิต</label>
					<form class="form-inline">
						<input type="number" min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Payment deadline" id="pay_deadline"><b> วัน</b>
					</form>
					</div>
				</div>
				<div class="col-md-8" id="">
	            <div id="a30" class="form-group">
	                <label>สถานที่วางบิล </label>
	                  <input type='text' class="form-control border-input" placeholder="Billing location" id="pay_locabill">
	             </div>
	       </div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
							<label>ระเบียบการวางบิล</label>
							<form>
								<label class="radio-inline">
									<input type="radio" name="optradio" value="1" id="billing1"><b>ต้องมี PO ใบสั่งซื้อ</b>
								</label>
								<label class="radio-inline">
									<input type="radio" name="optradio" value="2" id="billing2"><b>เงื่อนไขอื่น ๆ</b>
								</label>
							</form>
					</div>
				</div>
				<div class="col-md-8">
					<div id="a31" class="form-group">
							<label>เงื่อนไขอื่น ๆ</label>
								<input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="billing_other">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label><u>ข้อมูลทั่วไปอื่นๆ</u></label>
				</div>
				<div class="col-md-3">
					<div id="a32" class="form-group">
					<label>1) ร้านค้าที่เคยติดต่อ</label>
						<input type="text" class="form-control border-input" placeholder="Merchants contacted" id="contacted_open">
				</div>
				</div>
				<div class="col-md-3">
					<div id="a33" class="form-group">
					<label>สินค้า</label>
						<input type="text" class="form-control border-input" placeholder="Merchants contacted" id="product_open">
					</div>
				</div>
				<div class="col-md-2">
					<div id="a34" class="form-group">
					<label>วงเงิน</label>
						<input type="number"  min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Merchants contacted" id="product_mon">
					</div>
				</div>
				<div class="col-md-4">
					<div id="a35" class="form-group">
						<label>เครดิต</label>
					<form class="form-inline">
						<input type="number"  min="0" onkeypress="return event.charCode >= 48" class="form-control border-input" placeholder="Merchants contacted" id="product_credit"><b> วัน</b>
					<form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div id="a36" class="form-group">
					<label>2) ธนาคารที่ติดต่อ</label>
						<input type="text" class="form-control border-input" placeholder="Contact bank" id="bank_open">
					</div>
				</div>
				<div class="col-md-4">
					<div id="a37" class="form-group">
					<label>สาขา</label>
						<input type="text" class="form-control border-input" placeholder="Branch bank" id="bankbran_open">
					</div>
				</div>
				<div class="col-md-3">
					<div id="a38" class="form-group">
						<label>เลขที่บัญชี</label>
						<input type="text" class="form-control border-input" placeholder="Account number" id="booknum_open">
					</div>
				</div>
			</div>
    </div>
		<div id="menu2" class="tab-pane fade">
				<div class="row">
					<div class="col-md-3">
							<div id="a39" class="form-group">
									<label>คำนำหน้า</label>
									<select class="form-control" id="cus_tit">
											<option value="0"> # คำนำหน้า # </option>
											<?php $sqlcus = 'SELECT * FROM tbltitle';
														$resultcus = mysql_query($sqlcus) or die(mysql_error());
														while ($rowcus = mysql_fetch_array($resultcus)) { ?>
											<option value="<?php echo $rowcus['tit_id']; ?>" <? if($rowcus['tit_id']==1){ ?> selected <? } ?> ><?php echo $rowcus['tit_name']; ?></option>
											<?php } ?>
									</select>
                                    <small id="amsgtit" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
					<div class="col-md-3">
							<div id="a40" class="form-group">
									<label>ชื่อผู้ติดต่อ *</label>
										<input type="text" class="form-control border-input" placeholder="Contact Name" id="cus_name">
										<small id="amsg40" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a41" class="form-group">
										<label>นามสกุลผู้ติดต่อ *</label>
											<input type="text" class="form-control border-input" placeholder="Contact Lastname" id="cus_lname">
											<small id="amsg41" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
						<div class="col-md-3">
							<div id="a42" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="Contact Position" id="cus_position">
								</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-4">
							<div id="a47" class="form-group">
									<label>เลขบัตรประชาชน / เลขที่ผู้เสียภาษี *</label>
										<input type="text" class="form-control border-input" placeholder="ID card / Tax identification number" id="cus_idcard" maxlength="13">
										<small id="amsg47" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a48" class="form-group">
										<label>เบอร์โทรศัพท์ผู้ติดต่อ *</label>
											<input type="text" class="form-control border-input" placeholder="Telephone Customer" id="cus_phonecus">
											<small id="amsg48" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
					<div class="col-md-5">
							<div id="a43" class="form-group">
									<label>แผนก / ฝ่าย</label>
										<input type="text" class="form-control border-input" placeholder="Contact Department" id="cus_department">
								</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-4">
							<div id="a49" class="form-group">
									<label>E-mail *</label>
										<input type="email" class="form-control border-input" placeholder="E-mail" id="cus_email">
										<small id="amsg49" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a50" class="form-group">
										<label>Line</label>
											<input type="text" class="form-control border-input" placeholder="Line" id="cus_line">
											<small id="amsg50" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
					<div class="col-md-5">
							<div id="a51" class="form-group">
									<label>Facebook</label>
										<input type="text" class="form-control border-input" placeholder="Facebook" id="cus_face">
								</div>
						</div>
				</div>
				<form id="form1">
					<label>กรรมการบริษัทคนที่ 1</label>
					<div class="row">
						<div class="col-md-3">
								<div id="a52" class="form-group">
										<label>คำนำหน้า</label>
										<select class="form-control" id="tit1">
												<option value="0"> # คำนำหน้า # </option>
												<?php $sqlcus1 = 'SELECT * FROM tbltitle';
															$resultcus1 = mysql_query($sqlcus1) or die(mysql_error());
															while ($rowcus1 = mysql_fetch_array($resultcus1)) { ?>
												<option value="<?php echo $rowcus1['tit_id']; ?>" ><?php echo $rowcus1['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a53" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name1">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a54" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname1">
										</div>
								</div>
					</div>
					<div class="row">
				<div class="col-md-4">
					<div id="a55" class="form-group">
							<label>รหัสบัตรประชาชน</label>
								<input type="text" class="form-control border-input" placeholder="ID card" id="idcard1" maxlength="13">
						</div>
				</div>
						<div class="col-md-5">
							<div id="a56" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position1">
								</div>
						</div>
					</div>
				</form>

				<form id="form2">
					<label>กรรมการบริษัทคนที่ 2</label>
					<div class="row">
						<div class="col-md-3">
								<div id="a57" class="form-group">
										<label>คำนำหน้า</label>
										<select class="form-control" id="tit2">
												<option value="0"> # คำนำหน้า # </option>
												<?php $sqlcus2 = 'SELECT * FROM tbltitle';
															$resultcus2 = mysql_query($sqlcus2) or die(mysql_error());
															while ($rowcus2 = mysql_fetch_array($resultcus2)) { ?>
												<option value="<?php echo $rowcus2['tit_id']; ?>" ><?php echo $rowcus2['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a58" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name2">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a59" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname2">
										</div>
								</div>
					</div>
					<div class="row">
				<div class="col-md-4">
					<div id="a60" class="form-group">
							<label>รหัสบัตรประชาชน</label>
								<input type="text" class="form-control border-input" placeholder="ID card" id="idcard2"  maxlength="13">
						</div>
				</div>
						<div class="col-md-5">
							<div id="a61" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position2">
								</div>
						</div>
					</div>
				</form>

				<form id="form3">
					<label>กรรมการบริษัทคนที่ 3</label>
					<div class="row">
						<div class="col-md-3">
								<div id="a62" class="form-group">
										<label>คำนำหน้า</label>
										<select class="form-control" id="tit3">
												<option value="0"> # คำนำหน้า # </option>
												<?php $sqlcus3 = 'SELECT * FROM tbltitle';
															$resultcus3 = mysql_query($sqlcus3) or die(mysql_error());
															while ($rowcus3 = mysql_fetch_array($resultcus3)) { ?>
												<option value="<?php echo $rowcus3['tit_id']; ?>" ><?php echo $rowcus3['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a63" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name3">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a64" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname3">
										</div>
								</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div id="a65" class="form-group">
									<label>รหัสบัตรประชาชน</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="idcard3"  maxlength="13">
								</div>
						</div>
						<div class="col-md-5">
							<div id="a66" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position3">
								</div>
						</div>
					</div>
				</form>

				<div class="row">
					<div class="col-md-6">
							<div id="a44" class="form-group">
									<label>ชื่อ-สกุล พนักงานขาย *</label>
									<input type="text" class="form-control border-input" placeholder="Sale Name" id="sale_name"  value="<?php echo "{$_SESSION['use_name']}  {$_SESSION['use_lname']}"; ?>" disabled>
								</div>
						</div>
					<div class="col-md-3">
						<div id="a45" class="form-group">
									<label>สาขา *</label>
									<select class="form-control" id="sale_branch" disabled>
											<option value="0"> # สาขา # </option>
											<?php $sqlbran = "SELECT * FROM tblbrand";
											$resultbran = mysql_query($sqlbran) or die(mysql_error());
											while ($rowbran = mysql_fetch_array($resultbran)) { 
												 
											?>
											   <option value="<?php echo $rowbran['bran_id']; ?>"
                       							 <?php if ($_SESSION['use_branid'] == $rowbran['bran_id']) {
                          							echo 'selected="selected"';
													$bran_status = $rowbran['bran_status'];
                        							} ?>
                        						><?php echo $rowbran['bran_name']; ?></option>
										<?php } ?>
									</select>
								</div>
						</div>
						<div class="col-md-3">
							<div id="a67" class="form-group">
										<label>เขตการพิจารณา *</label>
										<select class="form-control" id="consideration">
												<option value="0"> # เขตการพิจารณา # </option>
												<?php $sqlconsi = 'SELECT * FROM tblconsideration';
															$resultconsi = mysql_query($sqlconsi) or die(mysql_error());
															while ($rowconsi = mysql_fetch_array($resultconsi)){ ?>
												<option value="<?php echo $rowconsi['consi_id']; ?>" <? if($bran_status==$rowconsi['consi_id']){ ?> selected <? } ?> ><?php echo $rowconsi['consi_name']; ?></option>
												<?php } ?>
										</select>
                                        <small id="amsgconsid" class="form-text text-muted" style="color:#F30;"></small>
							</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-6">
							<div id="a68" class="form-group">
									<label>ชื่อ-สกุล ผู้ดูแลลูกค้า *</label>
									<input type="text" class="form-control border-input" placeholder="Sale Name" id="sale_name_cus">
								</div>
						</div>
					<div class="col-md-3">
						<div id="a69" class="form-group">
									<label>สาขา *</label>
									<select class="form-control" id="sale_branch_cus">
											<option value="0"> # สาขา # </option>
											<?php $sqlbran = "SELECT * FROM tblbrand";
											$resultbran = mysql_query($sqlbran) or die(mysql_error());
											while ($rowbran = mysql_fetch_array($resultbran)) { ?>
											   <option value="<?php echo $rowbran['bran_id']; ?>"><?php echo $rowbran['bran_name']; ?></option>
											<?php } ?>
									</select>
								</div>
						</div>
				</div>
				<div class="row">
					<div id="a46" class="col-md-12">
							<div class="form-group">
									<label>ความเห็นผู้แทนขาย</label>
										<textarea class="form-control border-input notes" placeholder="Sele Comment" id="sale_comment" rows="5"></textarea>
								</div>
						</div>
				</div>
		</div>
	</div>
    </form>
</body>
</html>
<?php
	mysql_close($c); //close connection
?>
