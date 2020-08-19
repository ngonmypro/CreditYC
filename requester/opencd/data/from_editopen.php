<?php session_start();
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
</style>
<script type="text/javascript">
	$(document).ready(function(){
/*$("#a04").hide();
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
$("#a31").hide();*/
$("#form1").hide();
$("#form2").hide();
$("#form3").hide();

    $("#open_typeE").change(function() {
        $.post("requester/opencd/process/chk_typeopen.php",
          {
              pro : $('#open_typeE').val()
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

      $("#open_busiprovinE").change(function() {
          $.post("requester/opencd/process/chk_amphur.php",
            {
                pro : $('#open_busiprovinE').val()
            },
            function(data){
            $("#open_busiamphurE").html(data);
            });
        });

        $("#open_busiamphurE").change(function() {
            $.post("requester/opencd/process/chk_district.php",
              {
                  pro : $('#open_busiamphurE').val()
              },
              function(data){
              $("#open_busidistrictE").html(data);
              });
          });

          $("#open_busidistrictE").change(function() {
              $.post("requester/opencd/process/chk_zipcode.php",
                {
                    pro : $('#open_busidistrictE').val()
                },
                function(data){
                $("#open_busizipcodeE").html(data);
                });
            });

            $("#open_typeproject2E").click(function() {
                $.post("requester/opencd/process/chk_typeproject.php",
                  {
                      pro : $('#open_typeproject2E').val()
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

              $("#open_typeproject1E").click(function() {
                  $.post("requester/opencd/process/chk_typeproject.php",
                    {
                        pro : $('#open_typeproject1E').val()
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

								$("#project_typeE").change(function() {
						        $.post("requester/opencd/process/chk_typepro.php",
						          {
						              pro : $('#project_typeE').val()
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

									$("#pay_typeE").change(function() {
							        $.post("requester/opencd/process/chk_typepay.php",
							          {
							              pro : $('#pay_typeE').val()
							          },
							          function(data){
							            if (data == 1) {
							              $("#a28").show();
							            }else {
							              $("#a28").hide();
							            }
							          });
							      });

										$("#billing2E").click(function() {
				                $.post("requester/opencd/process/chk_billing.php",
				                  {
				                      pro : $('#billing2E').val()
				                  },
				                  function(data){
				                    if (data == 1) {
				                      $("#a31").show();
				                    }else {
				                      $("#a31").hide();
				                    }
				                  });
				              });

				              $("#billing1E").click(function() {
				                  $.post("requester/opencd/process/chk_billing.php",
				                    {
				                        pro : $('#billing1E').val()
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
			$('#customer_codeE').blur(function() {
					if($('#customer_codeE').val().length==0){
						//
					}else{
						$('#a01').addClass('has-success');
					}
				});
				$('#open_dateE').blur(function() {
						if($('#open_dateE').val().length==0){
							//
						}else{
							$('#a02').addClass('has-success');
						}
					});
				// ประเภทการขอเปิด
				$('#open_typeE').blur(function() {
						if($('#open_typeE').val().length==0){
							//
						}else{
							$('#a03').addClass('has-success');
						}
					});
				$('#open_otherE').blur(function() {
						if($('#open_otherE').val().length==0){
							//
						}else{
							$('#a04').addClass('has-success');
						}
					});

					// ชื่อกิจการ
				$('#open_businameE').blur(function() {
						if($('#open_businameE').val().length==0){
							$('#a05').addClass('has-error');
							$('#amsg5').html('ชื่อกิจการ ต้องไม่เป็นค่าว่าง!');
							$('#open_businameE').focus();
						}else{
							$('#a05').removeClass('has-error');
							$('#a05').addClass('has-success');
							$('#amsg5').html('');
						}
					});
						// ที่อยู่
					$('#open_busilocaE').blur(function() {
							if($('#open_busilocaE').val().length==0){
								$('#a06').addClass('has-error');
								$('#amsg6').html('ที่อยู่ ต้องไม่เป็นค่าว่าง!');
								$('#open_busilocaE').focus();
							}else{
								$('#a06').removeClass('has-error');
								$('#a06').addClass('has-success');
								$('#amsg6').html('');
							}
						});
						// หมู่ที่
					$('#open_busiswineE').blur(function() {
							if($('#open_busiswineE').val().length==0){
								//
							}else{
								$('#a07').addClass('has-success');
							}
						});
						// ถนน
					$('#open_busiroadE').blur(function() {
							if($('#open_busiroadE').val().length==0){
								//
							}else{
								$('#a08').addClass('has-success');
							}
						});
						// ตรอก/ซอย
					$('#open_busialleyE').blur(function() {
							if($('#open_busialleyE').val().length==0){
								//
							}else{
								$('#a09').addClass('has-success');
							}
						});
						// จังหวัด
					$('#open_busiprovinE').blur(function() {
							if($('#open_busiprovinE').val().length==0){
								//
							}else{
								$('#a10').addClass('has-success');
							}
						});
						// อำเภอ
					$('#open_busiamphurE').blur(function() {
							if($('#open_busiamphurE').val().length==0){
								//
							}else{
								$('#a11').addClass('has-success');
							}
						});
						// ตำบล
					$('#open_busidistrictE').blur(function() {
							if($('#open_busidistrictE').val().length==0){
								//
							}else{
								$('#a12').addClass('has-success');
							}
						});
						// รหัรหัสไปรษณีย์
					$('#open_busizipcodeE').blur(function() {
							if($('#open_busizipcodeE').val().length==0){
								//
							}else{
								$('#a13').addClass('has-success');
							}
						});
						// เบอร์โทรศัพท์
					$('#open_phoneE').blur(function() {
							if($('#open_phoneE').val().length==0){
								$('#a14').addClass('has-error');
								$('#amsg14').html('เบอร์โทรศัพท์ ต้องไม่เป็นค่าว่าง!');
								$('#open_phoneE').focus();
							}else{
								$('#a14').removeClass('has-error');
								$('#a14').addClass('has-success');
								$('#amsg14').html('');
							}
						});
						// เบอร์แฟกซ์
					$('#open_faxE').blur(function() {
							if($('#open_faxE').val().length==0){
								//
							}else{
								$('#a15').addClass('has-success');
							}
						});
						// ชื่อโครงการ
					$('#open_nameprojectE').blur(function() {
							if($('#open_nameprojectE').val().length==0){
								//
							}else{
								$('#a16').addClass('has-success');
							}
						});
						// ที่ตั้งโครงการ
					$('#open_locaprojectE').blur(function() {
							if($('#open_locaprojectE').val().length==0){
								//
							}else{
								$('#a17').addClass('has-success');
							}
						});
						//ระยะเวลาสัญญา
					$('#open_dateprojectE').blur(function() {
							if($('#open_dateprojectE').val().length==0){
								//
							}else{
								$('#a18').addClass('has-success');
							}
						});
						//วันที่เริ่มก่อสร้าง
					$('#open_dateprostartE').blur(function() {
							if($('#open_dateprostartE').val().length==0){
								//
							}else{
								$('#a19').addClass('has-success');
							}
						});
						//วันที่จบโครงการ
					$('#open_dateproendE').blur(function() {
							if($('#open_dateproendE').val().length==0){
								//
							}else{
								$('#a20').addClass('has-success');
							}
						});
						//มูลค่าโครงการ
					$('#open_promonE').blur(function() {
							if($('#open_promonE').val().length==0){
								//
							}else{
								$('#a21').addClass('has-success');
							}
						});
						//เริ่มใช้สินค้า
					$('#proget_startE').blur(function() {
							if($('#proget_startE').val().length==0){
								//
							}else{
								$('#a22').addClass('has-success');
							}
						});
						//ประเภทงานก่อสร้าง
					$('#project_typeE').blur(function() {
							if($('#project_typeE').val().length==0){
								//
							}else{
								$('#a23').addClass('has-success');
							}
						});
						//ประเภทอื่นๆ
					$('#project_otherE').blur(function() {
							if($('#project_otherE').val().length==0){
								//
							}else{
								$('#a24').addClass('has-success');
							}
						});
						//ซื้อเฉลี่ย/เดือน
					$('#project_averagebuyE').blur(function() {
							if($('#project_averagebuyE').val().length==0){
								//
							}else{
								$('#a25').addClass('has-success');
							}
						});
						//ซื้อรวม/ปี
					$('#project_buytotalE').blur(function() {
							if($('#project_buytotalE').val().length==0){
								//
							}else{
								$('#a26').addClass('has-success');
							}
						});
						//การชำระค่าสินค้า
					$('#pay_typeE').blur(function() {
							if($('#pay_typeE').val().length==0){
								//
							}else{
								$('#a27').addClass('has-success');
							}
						});
						//จ่ายช่องทางอื่น
					$('#pay_otherE').blur(function() {
							if($('#pay_otherE').val().length==0){
								//
							}else{
								$('#a28').addClass('has-success');
							}
						});
						//กำหนดชำระเงินเครดิต
					$('#pay_deadlineE').blur(function() {
							if($('#pay_deadlineE').val().length==0){
								//
							}else{
								$('#a29').addClass('has-success');
							}
						});
						//สถานที่วางบิล
					$('#pay_locabillE').blur(function() {
							if($('#pay_locabillE').val().length==0){
								//
							}else{
								$('#a30').addClass('has-success');
							}
						});
						//เงื่เงื่อนไขอื่น
					$('#billing_otherE').blur(function() {
							if($('#billing_otherE').val().length==0){
								//
							}else{
								$('#a31').addClass('has-success');
							}
						});
						//ร้านที่เคยติดต่อ
					$('#contacted_openE').blur(function() {
							if($('#contacted_openE').val().length==0){
								//
							}else{
								$('#a32').addClass('has-success');
							}
						});
						//สินค้า
					$('#product_openE').blur(function() {
							if($('#product_openE').val().length==0){
								//
							}else{
								$('#a33').addClass('has-success');
							}
						});
						//วงเงิน
					$('#product_monE').blur(function() {
							if($('#product_monE').val().length==0){
								//
							}else{
								$('#a34').addClass('has-success');
							}
						});
						//เครดิต
					$('#product_creditE').blur(function() {
							if($('#product_creditE').val().length==0){
								//
							}else{
								$('#a35').addClass('has-success');
							}
						});
						//ธนาคารที่ติดต่อ
					$('#bank_openE').blur(function() {
							if($('#bank_openE').val().length==0){
								//
							}else{
								$('#a36').addClass('has-success');
							}
						});
						//สาขา
					$('#bankbran_openE').blur(function() {
							if($('#bankbran_openE').val().length==0){
								//
							}else{
								$('#a37').addClass('has-success');
							}
						});
						//เลขที่บัญชี
					$('#booknum_openE').blur(function() {
							if($('#booknum_openE').val().length==0){
								//
							}else{
								$('#a38').addClass('has-success');
							}
						});
						//คำนำหน้าชื่อ
					$('#cus_titE').blur(function() {
							if($('#cus_titE').val().length==0){
								//
							}else{
								$('#a39').addClass('has-success');
							}
						});
						//ชื่อ
					$('#cus_nameE').blur(function() {
							if($('#cus_nameE').val().length==0){
								$('#a40').addClass('has-error');
								$('#amsg40').html('ชื่อ ต้องไม่เป็นค่าว่าง!');
								$('#cus_nameE').focus();
							}else{
								$('#a40').removeClass('has-error');
								$('#a40').addClass('has-success');
								$('#amsg40').html('');
							}
						});
						//นามสกุล
					$('#cus_lnameE').blur(function() {
							if($('#cus_lnameE').val().length==0){
								$('#a41').addClass('has-error');
								$('#amsg41').html('นามสกุล ต้องไม่เป็นค่าว่าง!');
								$('#cus_lnameE').focus();
							}else{
								$('#a41').removeClass('has-error');
								$('#a41').addClass('has-success');
								$('#amsg41').html('');
							}
						});
						//ตำแหน่ง
					$('#cus_positionE').blur(function() {
							if($('#cus_positionE').val().length==0){
								//
							}else{
								$('#a42').addClass('has-success');
							}
						});
						//แผนก/ฝ่าย
					$('#cus_departmentE').blur(function() {
							if($('#cus_departmentE').val().length==0){
								//
							}else{
								$('#a43').addClass('has-success');
							}
						});
						//พนัพนักงานขาย
					$('#sale_nameE').blur(function() {
							if($('#sale_nameE').val().length==0){
								//
							}else{
								$('#a44').addClass('has-success');
							}
						});
						//สาขา
					$('#sale_branchE').blur(function() {
							if($('#sale_branchE').val().length==0){
								//
							}else{
								$('#a45').addClass('has-success');
							}
						});
						//ความคิดแห็น
					$('#sale_commentE').blur(function() {
							if($('#sale_commentE').val().length==0){
								//
							}else{
								$('#a46').addClass('has-success');
							}
						});
						//เลขบัตรประชาชน/เลขผู้เสียภาษี
					$('#cus_idcardE').blur(function() {
							if($('#cus_idcardE').val().length==0){
								$('#a47').addClass('has-error');
								$('#amsg47').html('เลขบัตรประชาชน/เลขผู้เสียภาษี ต้องไม่เป็นค่าว่าง!');
								$('#cus_idcardE').focus();
							}else if ($('#cus_idcardE').val().match(/^([0-9-]){13}$/)){
								$('#a47').removeClass('has-error');
								$('#a47').addClass('has-success');
								$('#amsg47').html('');
							}else{
								$('#a47').addClass('has-error');
								$('#amsg47').html('ตัวเลข ความยาวระหว่าง 13 ตัวอักษร!');
								$('#cus_idcardE').focus();
							}
						});

						//เช็คโชว์กรรมการบริษัทคนที่1
						$.post("requester/opencd/process/chk_1.php",
							{
									pro : $('#idcard1').val()
							},
							function(msg){
								//alert(msg);
								if (msg == 1) {
									//alert("data");
									$("#form1").show();
									$("#form2").show();
								}else {
									$("#form1").hide();
									$("#form2").hide();
									$("#form3").hide();
								}
							});

								//เช็คโชว์กรรมการบริษัทคนที่2
				        $.post("requester/opencd/process/chk_2.php",
				          {
				              pro : $('#idcard2').val()
				          },
				          function(msg){
				            //alert(msg);
				            if (msg == 1) {
				              //alert("data");
				              $("#form2").show();
											$("#form3").show();
				            }else {
											//$("#form2").hide();
											$("#form3").hide();
				            }
				          });

									//เช็คโชว์กรรมการบริษัทคนที่3
					        $.post("requester/opencd/process/chk_3.php",
					          {
					              pro : $('#idcard3').val()
					          },
					          function(msg){
					            //alert(msg);
					            if (msg == 1) {
					              //alert("data");
					              $("#form3").show();
					            }else {
												//$("#form3").hide();
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
												}else if ($('#cus_email').val().match(/^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]$/)){
													$('#a49').removeClass('has-error');
													$('#a49').addClass('has-success');
													$('#amsg49').html('');
												}else{
													$('#a49').addClass('has-error');
													$('#amsg49').html('ต้องกรอกเป็น Email *admin@gmail.com*');
													$('#cus_email').focus();
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
	if($('#open_dateprostartE').val()){
		if($('#open_dateproendE').val()){
			if($('#open_dateprostartE').val()<$('#open_dateproendE').val()){
				//alert(daysBetween($('#open_dateprostart').val(), $('#open_dateproend').val()));
				var datep = daysBetween($('#open_dateprostartE').val(), $('#open_dateproendE').val());
				//open_dateproend//open_dateprostart//open_dateproject
				$("#open_dateprojectE").val(datep);
			}else{
				BootstrapDialog.alert("กรุณาเลือกวันที่ให้เหมาะสม วันที่เริ่ม ควรจะน้อยกว่า วันที่ สิ้นสุด");
				$('#open_dateprostartE').val("");
				$('#open_dateproendE').val("");
				$("#open_dateprojectE").val(0);
				$('#open_dateprostartE').focus();
			}
		}
	}
}
</script>
</head>

<body>
	<form id="addreqfrm" name="addreqfrm">
		<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">ใบขอเปิดวงเงินเครดิตหน้าแรก</a></li>
    <li><a data-toggle="tab" href="#menu1">ใบขอเปิดวงเงินเครดิตหน้าที่ 5</a></li>
  </ul>
      <?php $crd2_id = $_GET['reqid'];
      $sqle1 = "SELECT * FROM tblcreditopen2 WHERE crd2_id = '$crd2_id'";
      $resulte1 = mysql_query($sqle1) or die(mysql_error());
      if($resulte1){
        if(mysql_num_rows($resulte1)>0){
      $row1=mysql_fetch_array($resulte1);
        $row1['crd2_crd1id'];
        $row1['crd2_cusid'];
        $row1['crd2_useid'];
      $dateopen = $row1['crd2_dateopen'];
      $comment = $row1['crd2_comment'];
			$crd2_consi_id = $row1['crd2_consi_id'];
			$crd2_sellname = $row1['crd2_sellname'];
			$crd2_sellbranid = $row1['crd2_sellbranid'];
      $sqle2 = "SELECT * FROM tblcustomer, tblcreditopen1, tbluser WHERE cus_id = '".$row1['crd2_cusid']."' AND crd1_id = '".$row1['crd2_crd1id']."' AND use_id = '".$row1['crd2_useid']."'";
      $resulte2 = mysql_query($sqle2) or die(mysql_error());
      $row2=mysql_fetch_array($resulte2);
      //tblcustomer
      $cuscode = $row2['cus_code'];  //รหัสลูกค้า
      $custitid = $row2['cus_titid']; //คำนำหน้า
      $cusname = $row2['cus_name']; //ชื่อ
      $cuslname = $row2['cus_lname']; //นามสกุล
      $cusidcrad = $row2['cus_idcard']; //รหัสบัตรประชาชน
      $cusposi = $row2['cus_position']; //ตำแหน่ง
      $cusdepart = $row2['cus_department']; //ฝ่าย/แผนก
      $cusopenid = $row2['cus_openid'];  //ประเภทการขอเปิด
      $cusopenoth = $row2['cus_openoth']; //ประเภทการขอเปิดอื่นๆ
      $cuscomname = $row2['cus_company']; //ชื่อบริษัท
      $cusaddno = $row2['cus_addno']; //ที่อยู่
      $cusmno = $row2['cus_mno']; //หมู่ที่
      $cusroad = $row2['cus_roadname'];  //ถนน
      $cusalley = $row2['cus_alleyname']; //ตรอก/ซอย
      $cusdistri = $row2['cus_districtid'];  //ตำบล
      $cusamp = $row2['cus_amphurid'];  //อำเภอ
      $cusprovi = $row2['cus_provinceid'];  //จังหวัด
      $cuszip = $row2['cus_zipcodeid']; //รหัสไปรษณีย์
      $cusphone = $row2['cus_phoneno']; //เบอร์โทรศัพท์
      $cusfax = $row2['cus_faxno']; //เบอร์แฟกซ์
			$cus_phonecus = $row2['cus_phonecus'];
			$email = $row2['cus_email'];
			$line = $row2['cus_line'];
			$face = $row2['cus_face'];
			$tit1 = $row2['cus_tit1'];
			$name1 = $row2['cus_name1'];
			$lname1 = $row2['cus_lname1'];
			$idcard1 = $row2['cus_idcard1'];
			$position1 = $row2['cus_position1'];
			$tit2 = $row2['cus_tit2'];
			$name2 = $row2['cus_name2'];
			$lname2 = $row2['cus_lname2'];
			$idcard2 = $row2['cus_idcard2'];
			$position2 = $row2['cus_position2'];
			$tit3 = $row2['cus_tit3'];
			$name3 = $row2['cus_name3'];
			$lname3 = $row2['cus_lname3'];
			$idcard3 = $row2['cus_idcard3'];
			$position3 = $row2['cus_position3'];

      //tblcreditopen1
      $objec = $row2['crd1_objec'];  //การนำไปใช้
      $proname = $row2['crd1_projectname'];  //ชื่อโครงการ
      $constru = $row2['crd1_construction']; //ที่ตั้งโครงการ
      $promise = $row2['crd1_promise'];  //จำนวนวันก่อสร้าง
      $startproj = $row2['crd1_startproject']; //วันที่เริ่มต้น
      $endproj = $row2['crd1_endproject']; //วันที่สิ้นสุด
      $convalue = $row2['crd1_consvalue'];  //มูลค่าโครงการ
      $startprod = $row2['crd1_startproduct']; //เริ่มใช้สินค้า
      $proty = $row2['crd1_projecttype'];  //ประเภทโครงการ
      $prooth = $row2['crd1_projectoth']; //โครงการอื่นๆ
      $buildingm = $row2['crd1_buildingm'];  //การซื้อเฉลี่ย
      $sumbuild = $row2['crd1_buildingy'];  //ซื้อรวม/ปี
      $transpo = $row2['crd1_transpose'];  //สถานที่จัดส่ง
      $pay = $row2['crd1_payment'];  //การชำระสินนค้า
      $payoth = $row2['crd1_paymentoth']; //ชำระสินค้าทางอื่นๆ
      $daypay = $row2['crd1_setpayment']; //กำหนดวันชำระ
      $billloc = $row2['crd1_billingloc']; //สถานที่วางบิล
      $foemal = $row2['crd1_formalbil'];  //ระเบียบการวางบิล
      $foemaloth = $row2['crd1_foemalbiloth']; //ระเบียบอื่นๆๆ
      $shopconta = $row2['crd1_shopcontaot'];  //ร้านค้าที่เคยติดต่อ
      $product = $row2['crd1_product'];  //สินค้า
      $crdlimit = $row2['crd1_limit'];  //วงเงิน
      $crdday = $row2['crd1_crdday']; //วันจ่ายเครดิต
      $namebank = $row2['crd1_bank']; //ธนาคาร
      $branbank = $row2['crd1_branbank']; //สาขาธนาคาร
      $numbook = $row2['crd1_accountbank'];  //เลขบัญชี

      //tbluser
      $usename = $row2['use_name'];
      $uselname =$row2['use_lname'];
      $branid = $row2['use_branid'];
      }
    }
      ?>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="row">
        <div class="col-md-3">
            <div id="a01" class="form-group">
                <label>รหัสลูกค้า</label>
                  <input type='text' class="form-control border-input" id="customer_codeE" placeholder="Customer code" value="<?=$cuscode?>">
            </div>
        </div>
      </div>
			<div class="row">
        <div class="col-md-3">
            <div id="a02" class="form-group">
                <label>วันที่ *</label>
                  <input type='text' class="form-control border-input" id="open_dateE" placeholder="Submit Date" value="<?=$dateopen?>"/>
              </div>
          </div>
          <script type="text/javascript">
               $("#open_dateE").datepicker({
                  dateFormat: 'yy-mm-dd'
               });
          </script>
          <div class="col-md-3">
            <div id="a03" class="form-group">
                <label>ประเภทกิจการ *</label>
                <select class="form-control" id="open_typeE">
                    <option value="0"> # ประเภทกิจการ # </option>
                    <?php $sqlopen = 'SELECT * FROM tbltypeopen';
                          $resultopen = mysql_query($sqlopen) or die(mysql_error());
                          while ($rowopen = mysql_fetch_array($resultopen)) { ?>
                    <option value="<?php echo $rowopen['open_id']; ?>"
                      <?php if ($cusopenid == $rowopen['open_id']) {
                        echo 'selected="selected"';
                      } ?>
                      ><?php echo $rowopen['open_name']; ?></option>
                    <?php } ?>
                </select>
              </div>
          </div>
          <?php if ($cusopenid == 6) { ?>
          <div class="col-md-6">
            <div id="a04" class="form-group">
                <label>ประเภทกิจการอื่นๆ</label>
                  <input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="open_otherE" value="<?=$cusopenoth?>">
            </div>
          </div>
        <?php } ?>
			</div>
      <div class="row">
        <div class="col-md-6">
          <div id="a05" class="form-group">
              <label>ชื่อกิจการ/หน่วยงานที่จดทะเบียน *</label>
                <input type="text" class="form-control border-input" placeholder="Business Name" id="open_businameE" value="<?=$cuscomname?>">
                <small id="amsg5" class="form-text text-muted" style="color:#F30;"></small>
          </div>
        </div>
        <div class="col-md-3">
            <div id="a06" class="form-group">
              <label>สำนักงานที่ตั้ง *</label>
              <input type="text" class="form-control border-input" placeholder="Business Location" id="open_busilocaE" value="<?=$cusaddno?>">
              <small id="amsg6" class="form-text text-muted" style="color:#F30;"></small>
            </div>
        </div>
        <div class="col-md-3">
            <div id="a07" class="form-group">
              <label>หมู่ที่ *</label>
              <input type="text" class="form-control border-input" placeholder="Business Swine" id="open_busiswineE" value="<?=$cusmno?>">
              <small id="amsg7" class="form-text text-muted" style="color:#F30;"></small>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-3">
						<div id="a08" class="form-group">
            	<label>ถนน *</label>
            	<input type="text" class="form-control border-input" placeholder="Business Road" id="open_busiroadE" value="<?=$cusroad?>">
          	</div>
					</div>
          <div class="col-md-3">
						<div id="a09" class="form-group">
            	<label>ตรอก/ซอย *</label>
            	<input type="text" class="form-control border-input" placeholder="Business Alley" id="open_busialleyE" value="<?=$cusalley?>">
	            <small id="" class="form-text text-muted" style="color:#F30;"></small>
						</div>
					</div>
          <div class="col-md-3">
						<div id="a10" class="form-group">
            <label>จังหวัด *</label>
            <select class="form-control" id="open_busiprovinE">
                <option value="0"> # จังหวัด # </option>
                <?php $sqlprovi = 'SELECT * FROM province';
                      $resultprovi = mysql_query($sqlprovi) or die(mysql_error());
                      while ($rowprovi = mysql_fetch_array($resultprovi)) { ?>
                <option value="<?php echo $rowprovi['PROVINCE_ID']; ?>"
                  <?php if ($cusprovi == $rowprovi['PROVINCE_ID']) {
                    echo 'selected="selected"';
                  } ?>
                  ><?php echo $rowprovi['PROVINCE_NAME']; ?></option>
                <?php } ?>
            </select>
					</div>
				</div>
          <div class="col-md-3">
						<div id="a11" class="form-group">
            <label>อำเภอ *</label>
            <select class="form-control" id="open_busiamphurE">
                <option value="0"> # อำเภอ # </option>
                <?php
                $sqltamp = 'SELECT * FROM amphur';
                $resulttamp = mysql_query($sqltamp) or die(mysql_error());
                while ($rowtamp = mysql_fetch_array($resulttamp)) {?>
                  <option value="<?php echo $rowtamp['AMPHUR_ID']; ?>"
                    <?php if ($cusamp == $rowtamp['AMPHUR_ID']) {
                      echo 'selected="selected"';
                    } ?>
                    ><?php echo $rowtamp['AMPHUR_NAME']; ?></option>
                  <?php } ?>
            </select>
					</div>
				</div>
      </div>
      <div class="row">
        <div class="col-md-3">
					<div id="a12" class="form-group">
          <label>ตำบล *</label>
          <select class="form-control" id="open_busidistrictE">
              <option value="0"> # ตำบล # </option>
              <?php
              $sqltdistri = 'SELECT * FROM district';
              $resulttdistri = mysql_query($sqltdistri) or die(mysql_error());
              while ($rowtdistri = mysql_fetch_array($resulttdistri)) {?>
                <option value="<?php echo $rowtdistri['DISTRICT_ID']; ?>"
                  <?php if ($cusdistri == $rowtdistri['DISTRICT_ID']) {
                    echo 'selected="selected"';
                  } ?>
                  ><?php echo $rowtdistri['DISTRICT_NAME']; ?></option>
                <?php } ?>
          </select>
				</div>
			</div>
        <div class="col-md-3">
					<div id="a13" class="form-group">
          <label>รหัสไปรษณีย์ *</label>
          <select class="form-control" id="open_busizipcodeE">
              <option value="0"> # รหัสไปรษณีย์ # </option>
              <?php
              $sqltzip = 'SELECT * FROM zipcode';
              $resulttzip = mysql_query($sqltzip) or die(mysql_error());
              while ($rowtzip = mysql_fetch_array($resulttzip)) {?>
                <option value="<?php echo $rowtzip['ZIPCODE_ID']; ?>"
                  <?php if ($cuszip == $rowtzip['ZIPCODE_ID']) {
                    echo 'selected="selected"';
                  } ?>
                  ><?php echo $rowtzip['ZIPCODE']; ?></option>
                <?php } ?>
          </select>
				</div>
			</div>
        <div class="col-md-3">
					<div id="a14" class="form-group">
          <label>เบอร์โทรศัพท์ *</label>
          <input type="text" class="form-control border-input" placeholder="Telephone" id="open_phoneE" value="<?=$cusphone?>">
          <small id="amsg14" class="form-text text-muted" style="color:#F30;"></small>
				</div>
			</div>
        <div class="col-md-3">
					<div id="a15" class="form-group">
          <label>แฟกซ์</label>
          <input type="text" class="form-control border-input" placeholder="Fax" id="open_faxE" value="<?=$cusfax?>">
				</div>
			</div>
      </div>
      <div class="row">
        <div class="col-md-6">
					<div class="form-group">
          <label><u>มีความประสงค์ขอเปิดวงเงินเครดิต กับบริษัทฯ เพื่อวัตถุประสงค์ดังนี้</u></label>
        <form>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="1" id="open_typeproject1E" <? if($objec==1){ ?> checked='checked' <? } ?> ><b>นำสินค้าไปจำหน่าย (ร้านค้า)</b>
            </label>
            <label class="radio-inline">
              <input type="radio" name="optradio" value="2" id="open_typeproject2E" <? if($objec==2){ ?> checked='checked' <? } ?>><b>ใช้กับการก่อสร้างหน่วยงาน/</b>
            </label>
        </form>
			</div>
		</div>
    <? if($objec==2){ ?>
      <div class="col-md-6" id="a16">
				<div id="a16" class="form-group">
        	<label>โครงการชื่อ</label>
        	<input type="text" class="form-control border-input" placeholder="Project Name" id="open_nameprojectE" value="<?=$proname?>">
				</div>
			</div><? }?>
    </div>
    <? if($objec==2){ ?>
      <div class="row">
				<div class="col-md-12" id="a17">
					<div id="a17" class="form-group">
						<label>ที่ตั้ง</label>
						<input type="text" class="form-control border-input" placeholder="Project Location" id="open_locaprojectE" value="<?=$constru?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4" id="a18">
					<div id="a18" class="form-group">
						<label>ระยะเวลาสัญญา/ก่อสร้าง</label>
						<form class="form-inline">
							<input type="number" class="form-control border-input" disabled placeholder="Project Limitday" id="open_dateprojectE" value="<?=$promise?>"><b> วัน</b>
						</form>
					</div>
				</div>
				<div class="col-md-4" id="a19">
					<div id="a19" class="form-group">
						<label>วันที่เริ่มต้น</label>
						<input type="text" class="form-control border-input" onChange="javascript:cald1();" placeholder="Project Date Start" id="open_dateprostartE" value="<?=$startproj?>">
					</div>
				</div>
				<script type="text/javascript">
						 $("#open_dateprostartE").datepicker({
								dateFormat: 'yy-mm-dd'
						 });
				</script>
				<div class="col-md-4" id="a20">
					<div id="a20" class="form-group">
						<label>สิ้นสุด</label>
									<input type='text' class="form-control border-input" onChange="javascript:cald1();" placeholder="Project Date End" id="open_dateproendE" value="<?=$endproj?>">
							</div>
				</div>
					<script type="text/javascript">
							 $("#open_dateproendE").datepicker({
									dateFormat: 'yy-mm-dd'
							 });
					</script>
				</div>
			<div class="row">
				<div class="col-md-4" id="a21">
					<div id="a21" class="form-group">
						<label>เป็นมูลค่า</label>
					<form class="form-inline">
						<input type="text" class="form-control border-input" placeholder="Project Value" id="open_promonE" value="<?=$convalue?>"><b> บาท</b>
					</form>
					</div>
				</div>
				<div class="col-md-4" id="a22">
	            <div id="a22" class="form-group">
	                <label>เริ่มใช้สินค้า (ป/ด/ว)</label>
	                  <input type='text' class="form-control border-input" placeholder="Project Get Started" id="proget_startE" value="<?=$startprod?>">
	              </div>
	        </div>
	          <script type="text/javascript">
	               $("#proget_startE").datepicker({
	                  dateFormat: 'yy-mm-dd'
	               });
	          </script>
				</div>
			<div class="row" id="a23">
					<div class="col-md-4">
							<label>รายละเอียดของงานก่อสร้าง/โครงการ</label>
							<div id="a23" class="form-group">
	                <select class="form-control" id="project_typeE">
	                    <option value="0"> # ประเภทงานก่อสร้าง # </option>
	                    <?php $sqlcont = 'SELECT * FROM tbltypeconstruct';
	                          $resultcont = mysql_query($sqlcont) or die(mysql_error());
	                          while ($rowcont = mysql_fetch_array($resultcont)) { ?>
	                    <option value="<?php echo $rowcont['cont_id']; ?>"
                          <?php if ($proty == $rowcont['cont_id']) {
                            echo 'selected="selected"';
                          } ?>
                        ><?php echo $rowcont['cont_name']; ?></option>
	                    <?php } ?>
	                </select>
	              </div>
					</div>
          <?php if ($proty == 8) { ?>
					<div class="col-md-8">
            <div id="a24" class="form-group">
                <label>ประเภทงานก่อสร้างอื่นๆ</label>
                  <input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="project_otherE" value="<?=$prooth?>">
            </div>
          </div>
        <?php } ?>
			</div>
    <? } ?>
			<div class="row">
				<div class="col-md-6">
					<div id="a25" class="form-group">
							<label>ประมาณการซื้อเฉลี่ย ต่อเดือน</label>
								<input type="text" class="form-control border-input" placeholder="Average Buy" id="project_averagebuyE" value="<?=$buildingm?>">
					</div>
				</div>
				<div class="col-md-6">
					<div id="a26" class="form-group">
							<label>ประมาณการซื้อรวมต่อปี</label>
								<input type="text" class="form-control border-input" placeholder="Buy Total" id="project_buytotalE" value="<?=$sumbuild?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
							<label><u>สถานที่ส่งสินค้า</u></label>
							<form>
			          <label class="radio-inline">
			            <input type="radio" name="optradio" value="1" id="delivery1E" <? if($transpo==1){ ?> checked='checked' <? } ?> ><b>สำนักงานใหญ่ ตามที่อยู่ข้างต้น</b>
			          </label>
			          <label class="radio-inline">
			            <input type="radio" name="optradio" value="2" id="delivery2E" <? if($transpo==2){ ?> checked='checked' <? } ?> ><b>กรณีที่อยู่ไม่ตรงกับสำนักงานใหญ่ ให้แนบใบแจ้งสถานที่ส่งสินค้า</b>
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
							<select class="form-control" id="pay_typeE">
									<option value="0"> # การชำระค่าสินค้า # </option>
									<?php $sqlpay = 'SELECT * FROM tbltypepayment';
												$resultpay = mysql_query($sqlpay) or die(mysql_error());
												while ($rowpay = mysql_fetch_array($resultpay)) { ?>
									<option value="<?php echo $rowpay['pay_id']; ?>"
                    <?php if ($pay == $rowpay['pay_id']) {
                      echo 'selected="selected"';
                    } ?>
                    ><?php echo $rowpay['pay_name']; ?></option>
									<?php } ?>
							</select>
						</div>
				</div>
        <?php if ($pay == 4){ ?>
				<div class="col-md-8">
					<div id="a28" class="form-group">
							<label>การชำระค่าสินค้าทางอื่นๆ</label>
								<input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="pay_otherE" value="<?=$payoth?>">
					</div>
				</div>
      <?php } ?>
			</div>
			<div class="row">
				<div class="col-md-4" id="">
					<div id="a29" class="form-group">
						<label>กำหนดชำระเงินเครดิต</label>
					<form class="form-inline">
						<input type="number" class="form-control border-input" placeholder="Payment deadline" id="pay_deadlineE" value="<?=$daypay?>"><b> วัน</b>
					</form>
					</div>
				</div>
				<div class="col-md-8" id="">
	            <div id="a30" class="form-group">
	                <label>สถานที่วางบิล</label>
	                  <input type='text' class="form-control border-input" placeholder="Billing location" id="pay_locabillE" value="<?=$billloc?>">
	             </div>
	       </div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
							<label>ระเบียบการวางบิล</label>
							<form>
								<label class="radio-inline">
									<input type="radio" name="optradio" value="1" id="billing1E" <? if($foemal==1){ ?> checked='checked' <? } ?> ><b>ต้องมี PO ใบสั่งซื้อ</b>
								</label>
								<label class="radio-inline">
									<input type="radio" name="optradio" value="2" id="billing2E" <? if($foemal==2){ ?> checked='checked' <? } ?> ><b>เงื่อนไขอื่น ๆ</b>
								</label>
							</form>
					</div>
				</div>
        <? if($foemal==2){ ?>
				<div class="col-md-8">
					<div id="a31" class="form-group">
							<label>เงื่อนไขอื่น ๆ</label>
								<input type="text" class="form-control border-input" placeholder="กรอกข้อมูลถ้าเลือกอื่นๆ" id="billing_otherE" value="<?=$foemaloth?>">
					</div>
				</div>
        <?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label><u>ข้อมูลทั่วไปอื่นๆ</u></label>
				</div>
				<div class="col-md-3">
					<div id="a32" class="form-group">
					<label>1) ร้านค้าที่เคยติดต่อ</label>
						<input type="text" class="form-control border-input" placeholder="Merchants contacted" id="contacted_openE" value="<?=$shopconta?>">
				</div>
				</div>
				<div class="col-md-3">
					<div id="a33" class="form-group">
					<label>สินค้า</label>
						<input type="text" class="form-control border-input" placeholder="Merchants contacted" id="product_openE" value="<?=$product?>">
					</div>
				</div>
				<div class="col-md-2">
					<div id="a34" class="form-group">
					<label>วงเงิน</label>
						<input type="number" class="form-control border-input" placeholder="Merchants contacted" id="product_monE" value="<?=$crdlimit?>">
					</div>
				</div>
				<div class="col-md-4">
					<div id="a35" class="form-group">
						<label>เครดิต</label>
					<form class="form-inline">
						<input type="number" class="form-control border-input" placeholder="Merchants contacted" id="product_creditE" value="<?=$crdday?>"><b> วัน</b>
					<form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div id="a36" class="form-group">
					<label>2) ธนาคารที่ติดต่อ</label>
						<input type="text" class="form-control border-input" placeholder="Contact bank" id="bank_openE" value="<?=$namebank?>">
					</div>
				</div>
				<div class="col-md-4">
					<div id="a37" class="form-group">
					<label>สาขา</label>
						<input type="text" class="form-control border-input" placeholder="Branch bank" id="bankbran_openE" value="<?=$branbank?>">
					</div>
				</div>
				<div class="col-md-3">
					<div id="a38" class="form-group">
						<label>เลขที่บัญชี</label>
						<input type="text" class="form-control border-input" placeholder="Account number" id="booknum_openE" value="<?=$numbook?>">
					</div>
				</div>
			</div>
    </div>
    <div id="menu1" class="tab-pane fade">
				<div class="row">
					<div class="col-md-3">
							<div id="a39" class="form-group">
									<label>คำนำหน้า</label>
									<select class="form-control" id="cus_titE">
											<option value="0"> # คำนำหน้า # </option>
											<?php $sqltit = 'SELECT * FROM tbltitle';
											$resulttit = mysql_query($sqltit) or die(mysql_error());
											while ($rowtit = mysql_fetch_array($resulttit)) { ?>
											   <option value="<?php echo $rowtit['tit_id']; ?>"
                        <?php if ($custitid == $rowtit['tit_id']) {
                          echo 'selected="selected"';
                        } ?>
                        ><?php echo $rowtit['tit_name']; ?></option>
											<?php } ?>
									</select>
								</div>
						</div>
					<div class="col-md-3">
							<div id="a40" class="form-group">
									<label>ชื่อผู้ติดต่อ *</label>
										<input type="text" class="form-control border-input" placeholder="Contact Name" id="cus_nameE" value="<?=$cusname?>">
										<small id="amsg40" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a41" class="form-group">
										<label>นามสกุลผู้ติดต่อ *</label>
											<input type="text" class="form-control border-input" placeholder="Contact Lastname" id="cus_lnameE" value="<?=$cuslname?>">
											<small id="amsg41" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
						<div class="col-md-3">
							<div id="a42" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="Contact Position" id="cus_positionE" value="<?=$cusposi?>">
								</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-4">
							<div id="a47" class="form-group">
									<label>เลขบัตรประชาชน / เลขที่ผู้เสียภาษี *</label>
										<input type="text" class="form-control border-input" placeholder="ID card / Tax identification number" value="<?=$cusidcrad?>" id="cus_idcardE" maxlength="13">
										<small id="amsg47" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a48" class="form-group">
										<label>เบอร์โทรศัพท์ผู้ติดต่อ *</label>
											<input type="text" class="form-control border-input" placeholder="Telephone Customer" id="cus_phonecus" value="<?=$cus_phonecus?>">
											<small id="amsg48" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
					<div class="col-md-5">
							<div id="a43" class="form-group">
									<label>แผนก / ฝ่าย</label>
										<input type="text" class="form-control border-input" placeholder="Contact Department" id="cus_departmentE" value="<?=$cusdepart?>">
								</div>
						</div>
				</div>

				<div class="row">
					<div class="col-md-4">
							<div id="a49" class="form-group">
									<label>E-mail *</label>
										<input type="email" class="form-control border-input" placeholder="E-mail" id="cus_email" value="<?=$email?>">
										<small id="amsg49" class="form-text text-muted" style="color:#F30;"></small>
								</div>
						</div>
						<div class="col-md-3">
								<div id="a50" class="form-group">
										<label>Line</label>
											<input type="text" class="form-control border-input" placeholder="Line" id="cus_line" value="<?=$line?>">
											<small id="amsg50" class="form-text text-muted" style="color:#F30;"></small>
									</div>
							</div>
					<div class="col-md-5">
							<div id="a51" class="form-group">
									<label>Facebook</label>
										<input type="text" class="form-control border-input" placeholder="Facebook" id="cus_face" value="<?=$face?>">
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
												<?php $sqltit1 = 'SELECT * FROM tbltitle';
												$resulttit1 = mysql_query($sqltit1) or die(mysql_error());
												while ($rowtit1 = mysql_fetch_array($resulttit1)) { ?>
												   <option value="<?php echo $rowtit1['tit_id']; ?>"
	                        <?php if ($tit1 == $rowtit1['tit_id']) {
	                          echo 'selected="selected"';
	                        } ?>
	                        ><?php echo $rowtit1['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a53" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name1" value="<?=$name1?>">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a54" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname1" value="<?=$lname1?>">
										</div>
								</div>
					</div>
					<div class="row">
				<div class="col-md-4">
					<div id="a55" class="form-group">
							<label>รหัสบัตรประชาชน</label>
								<input type="text" class="form-control border-input" placeholder="ID card" id="idcard1" maxlength="13" value="<?=$idcard1?>">
						</div>
				</div>
						<div class="col-md-5">
							<div id="a56" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position1" value="<?=$position1?>">
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
												<?php $sqltit2 = 'SELECT * FROM tbltitle';
												$resulttit2 = mysql_query($sqltit2) or die(mysql_error());
												while ($rowtit2 = mysql_fetch_array($resulttit2)) { ?>
												   <option value="<?php echo $rowtit2['tit_id']; ?>"
	                        <?php if ($tit2 == $rowtit2['tit_id']) {
	                          echo 'selected="selected"';
	                        } ?>
	                        ><?php echo $rowtit2['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a58" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name2" value="<?=$name2?>">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a59" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname2" value="<?=$lname2?>">
										</div>
								</div>
					</div>
					<div class="row">
				<div class="col-md-4">
					<div id="a60" class="form-group">
							<label>รหัสบัตรประชาชน</label>
								<input type="text" class="form-control border-input" placeholder="ID card" id="idcard2"  maxlength="13" value="<?=$idcard2?>">
						</div>
				</div>
						<div class="col-md-5">
							<div id="a61" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position2" value="<?=$position2?>">
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
												<?php $sqltit3 = 'SELECT * FROM tbltitle';
												$resulttit3 = mysql_query($sqltit3) or die(mysql_error());
												while ($rowtit3 = mysql_fetch_array($resulttit3)) { ?>
												   <option value="<?php echo $rowtit3['tit_id']; ?>"
	                        <?php if ($tit3 == $rowtit3['tit_id']) {
	                          echo 'selected="selected"';
	                        } ?>
	                        ><?php echo $rowtit3['tit_name']; ?></option>
												<?php } ?>
										</select>
									</div>
							</div>
						<div class="col-md-4">
								<div id="a63" class="form-group">
										<label>ชื่อ</label>
											<input type="text" class="form-control border-input" placeholder="Name" id="name3" value="<?=$name3?>">
									</div>
							</div>
							<div class="col-md-4">
									<div id="a64" class="form-group">
											<label>นามสกุล</label>
												<input type="text" class="form-control border-input" placeholder="Lastname" id="lname3" value="<?=$lname3?>">
										</div>
								</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div id="a65" class="form-group">
									<label>รหัสบัตรประชาชน</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="idcard3"  maxlength="13" value="<?=$idcard3?>">
								</div>
						</div>
						<div class="col-md-5">
							<div id="a66" class="form-group">
									<label>ตำแหน่ง</label>
										<input type="text" class="form-control border-input" placeholder="ID card" id="position3" value="<?=$position3?>">
								</div>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-6">
							<div id="a44" class="form-group">
									<label>ชื่อ-สกุล พนักงานขาย *</label>
									<input type="text" class="form-control border-input" placeholder="Sale Name" id="sale_nameE"  value="<?=$usename?>  <?=$uselname?>" disabled>
								</div>
						</div>
					<div class="col-md-3">
						<div id="a45" class="form-group">
									<label>สาขา *</label>
									<?php $sqlreqtit = "SELECT * FROM tblbrand WHERE bran_id = '$branid'";
												$resultreqtit = mysql_query($sqlreqtit) or die(mysql_error());
												while ($rowreqtit = mysql_fetch_array($resultreqtit)) { ?>
										<input type="text" class="form-control border-input" placeholder="Sale Branch" id="sale_branchE" value="<?php echo $rowreqtit['bran_name']?>" disabled>
									<?php } ?>
								</div>
						</div>
						<div class="col-md-3">
							<div id="a67" class="form-group">
										<label>เขตการพิจารณา *</label>
										<select class="form-control" id="considerationE">
												<option value="0"> # เขตการพิจารณา # </option>
												<?php $sqlconsi = 'SELECT * FROM tblconsideration';
												$resultconsi = mysql_query($sqlconsi) or die(mysql_error());
												while ($rowconsi = mysql_fetch_array($resultconsi)) { ?>
												   <option value="<?php echo $rowconsi['consi_id']; ?>"
	                        <?php if ($crd2_consi_id == $rowconsi['consi_id']) {
	                          echo 'selected="selected"';
	                        } ?>
	                        ><?php echo $rowconsi['consi_name']; ?></option>
												<?php } ?>
										</select>
							</div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-6">
							<div id="a68" class="form-group">
									<label>ชื่อ-สกุล ผู้ดูแลลูกค้า *</label>
									<input type="text" class="form-control border-input" placeholder="Sale Name" id="sale_name_cusE"  value="<?=$crd2_sellname?>">
								</div>
						</div>
					<div class="col-md-3">
						<div id="a69" class="form-group">
									<label>สาขา *</label>
									<select class="form-control" id="sale_branch_cusE">
											<option value="0"> # สาขา # </option>
											<?php $sqlsell = 'SELECT * FROM tblbrand';
											$resultsell = mysql_query($sqlsell) or die(mysql_error());
											while ($rowsell = mysql_fetch_array($resultsell)) { ?>
												 <option value="<?php echo $rowsell['bran_id']; ?>"
												<?php if ($crd2_sellbranid == $rowsell['bran_id']) {
													echo 'selected="selected"';
												} ?>
												><?php echo $rowsell['bran_name']; ?></option>
											<?php } ?>
									</select>
								</div>
						</div>
				</div>
				<div class="row">
					<div id="a46" class="col-md-12">
							<div class="form-group">
									<label>ความเห็นผู้แทนขาย</label>
										<textarea class="form-control border-input notes" placeholder="Sele Comment" id="sale_commentE" rows="5"><?=$comment?></textarea>
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
