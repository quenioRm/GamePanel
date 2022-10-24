window._abyss = window._abyss || {}, window._abyss.mypage = function(e, i) {
	"use strict";
	var t = !1,
		a = function() {
			i(".js-printButton").on("click", function() {
				var e = document.getElementById("js-DivIdToPrint"),
					t = window.open("", "Print-Window");
				t.document.open(), t.document.write('<html><body onload="window.print()">' + e.innerHTML + "</body></html>"), t.document.close(), setTimeout(function() {
					t.close()
				}, 10)
			})
		},
		n = function() {
			var e = i("#copy_opt");
			i(".js-copyOtp").on("click", function() {
				e.select(), document.execCommand("copy"), alert(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_OTP_STEP2_BACKUPCODE_COPY_ALERT"))
			})
		},
		o = function() {
			var e = i("#account_layer_popup");
			i(".js-btnOpenPopup").on("click", function() {
				e.addClass("active")
			}), i(".js-btnClosePopup").on("click", function() {
				e.removeClass("active")
			})
		},
		s = function() {
			var n, e = i(".js-otpInputBox .js-inputOtp");
			e.on("keydown", function(e) {
				var t = i(this),
					a = t.prev(".js-inputOtp");
				n = t.val(), 13 == e.keyCode && i("#btnOtpCheck").trigger("click"), _abyss.isEmpty(n) && 8 == e.keyCode && (a.val(""), a.select())
			}), e.on("keyup", function(e) {
				var t = i(this),
					a = t.next(".js-inputOtp"),
					n = t.prev(".js-inputOtp");
				39 == e.keyCode && a.select(), 37 == e.keyCode && n.select(), 46 == e.keyCode && a.select()
			}), e.on("input", function(e) {
				var t = i(this),
					a = t.next(".js-inputOtp");
				n = t.val(), _abyss.isEmpty(n) || 8 === e.keyCode || a.select(), this.value.length > this.maxLength && (this.value = this.value.slice(0, this.maxLength))
			}), e.on("click", function(e) {
				i(e.target).select()
			}), i("#otpKey1").focus()
		},
		c = function() {
			function o() {
				var n = !1;
				t.each(function(e, t) {
					var a = i(t);
					_abyss.isEmpty(a.val()) && (n = !0)
				}), n ? (e.addClass("disabled"), e.attr("disabled", "disabled")) : (e.removeClass("disabled"), e.removeAttr("disabled"))
			}
			var n, e = i("#btnKeyCheck"),
				t = i(".js-keyInputBox .js-inputKey");
			t.on("keydown", function(e) {
				var t = i(this),
					a = t.prev(".js-inputKey");
				n = t.val(), 13 == e.keyCode && i("#btnKeyCheck").trigger("click"), _abyss.isEmpty(n) && 8 == e.keyCode && (a.val(""), a.select())
			}), t.on("keyup", function(e) {
				var t = i(this),
					a = t.next(".js-inputKey"),
					n = t.prev(".js-inputKey");
				39 == e.keyCode && a.select(), 37 == e.keyCode && n.select(), 46 == e.keyCode && a.select(), o()
			}), t.on("input", function(e) {
				var t = i(this),
					a = t.next(".js-inputKey");
				n = t.val(), _abyss.isEmpty(n) || 8 === e.keyCode || a.select(), this.value.length > this.maxLength && (this.value = this.value.slice(0, this.maxLength))
			}), t.on("click", function(e) {
				i(e.target).select()
			});
			var s = {};
			s.key1 = i("#authKey1"), s.key2 = i("#authKey2"), s.key3 = i("#authKey3"), s.key4 = i("#authKey4"), s.key5 = i("#authKey5"), s.key6 = i("#authKey6"), s.key7 = i("#authKey7"), s.key8 = i("#authKey8"), s.key1.focus(), s.key1.on("paste", function(e) {
				var t, a = (e.clipboardData || e.originalEvent.clipboardData || window.clipboardData).getData("text"),
					n = 6;
				1 < a.length && (t = a.replace(/[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@@\#$%&\\\=\(\'\"]/gi, "").replace(/ /gi, ""), s.key1.val(t.substr(0, 1)), s.key2.val(0 < t.substr(1, 1).length ? t.substr(1, 1) : s.key2.val()), s.key3.val(0 < t.substr(2, 1).length ? t.substr(2, 1) : s.key3.val()), s.key4.val(0 < t.substr(3, 1).length ? t.substr(3, 1) : s.key4.val()), s.key5.val(0 < t.substr(4, 1).length ? t.substr(4, 1) : s.key5.val()), s.key6.val(0 < t.substr(5, 1).length ? t.substr(5, 1) : s.key6.val()), s.key7.length && (s.key7.val(0 < t.substr(6, 1).length ? t.substr(6, 1) : s.key7.val()), n++), s.key8.length && (s.key8.val(0 < t.substr(7, 1).length ? t.substr(7, 1) : s.key8.val()), n++), n <= a.length ? i("#btnKeyCheck").focus() : s["key" + a.length].focus(), o())
			})
		};
	e.myInfoInit = function() {
		_abyss.initSelect2(), i(".js-main").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_MSG_MYPAGE_DEFAULT_CONFIRM")) && i.ajax({
				type: "post",
				url: "/Account/MyInfo/UpdateMainEmailProcess",
				data: {
					_idx: i(this).data("idx")
				},
				success: function(e) {
					alert(e.message), null != e.okUrl && (location.href = e.okUrl)
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		}), i("#removePhone").on("click", function() {
			0 != confirm(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_DELETE_MOBILE_CONFIRM")) && e(!1)
		}), i("#changePhone").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_MSG_MYPAGE_MYINFO_ASK_CHAGNE_MOBILE").replace("</br>", "\n")) && e(!0)
		}), i(".js-delet_btn").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_DELETEEMAILPROCESS_CONFIRM")) && i.ajax({
				type: "post",
				url: "/Account/MyInfo/DeleteEmailProcess",
				data: {
					_multiNo: i(this).data("idx")
				},
				success: function(e) {
					if (1 != (0 == e.resultCode)) return alert(e.resultMsg), !1;
					alert(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_DELETEEMAILPROCESS_SUCCESS")), location.reload()
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		});
		var e = function(e) {
			i.ajax({
				url: "/Account/MyInfo/UpdateMobile",
				type: "post",
				data: {
					_isChangeMobile: e
				},
				dataType: "json",
				async: !1,
				success: function(e) {
					if (0 != e.resultCode) return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MYPAGE_MYINFO_FAIL_UPDATE_MOBILE")), !1;
					0 < e.resultMsg.trim().length && alert(e.resultMsg.replace(/\\n/g, "\n")), "" != e.returnUrl && null != e.returnUrl ? location.href = e.returnUrl : location.reload()
				},
				error: function(e) {
					return !1
				}
			})
		};
		i("#frmMyinfo").on("submit", function() {
			var t = [];
			i(".js-unInterestedGame").each(function() {
				var e = i(this);
				0 == e.is(":checked") && t.push(e.attr("data_gamecode"))
			}), i("#hdUnInterestedGameStr").val(t.join(","))
		}), i("#js-linkAddEmail").click(function() {
			if (1 == i(this).hasClass("unused")) return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_ACCOUNT_MYINFO_EMAIL_ADD_DENY")), !1
		})
	}, e.reLoginInit = function() {
		i("#doLogin").on("click", function(e) {
			d()
		}), i("#_password").keydown(function(e) {
			13 === e.keyCode && d()
		})
	}, e.logginginit = function() {
		i("#frmLoggingSearch").submit(), i(".js-day").on("click", function() {
			i("#_term").val(i(this).data("term")), i("#_beginDate").setCustomDate(i(this).data("date")), i("#_endDate").setCustomDate(new Date), i("#frmLoggingSearch").submit()
		}), i("#btn_search").on("click", function() {
			i("#_term").val(4), i("#frmLoggingSearch").submit()
		})
	}, e.changePWOverDateInit = function() {
		i("#frmPasswordChangeLog").on("submit", function() {
			_abyss.btnLoaderAction(".js-btnPasswordChangeLater")
		})
	}, e.addEmailCompleteInit = function() {
		i("#btnMailSend").on("click", function() {
			var e = i("#frmAuthMailSend");
			if ("disabled" == i("#btnMailSend").attr("disabled")) return !1;
			i("#btnMailSend").attr("disabled", "disabled"), i.ajax({
				type: "post",
				url: "/Account/MyInfo/AddEmailAuthMailSend",
				data: e.serialize(),
				complete: function() {
					i("#btnMailSend").removeAttr("disabled")
				},
				success: function(e) {
					alert(e.message)
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		})
	}, e.passwordInit = function() {
		var e = /(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/,
			t = /(?!(?=.*&#))(((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/,
			a = /(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/,
			n = i(".js-password input"),
			o = i(".js-passShow");
		n.parent(".custom_inputBox").append('<span class="js-securityStep"></span>'), n.on("keyup", function() {
			1 == a.test(i(this).val()) ? _("safe") : 1 == t.test(i(this).val()) ? _("medium") : 1 == e.test(i(this).val()) ? _("weak") : _()
		}), o.on("click", function() {
			var e = i(this),
				t = e.siblings("input");
			"password" === t.attr("type") ? (e.parent().addClass("open"), t.attr("type", "text"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_HIDE"))) : (e.parent().removeClass("open"), t.attr("type", "password"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")))
		}), o.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")), i("#frmPasswordChange").on("submit", function() {
			return _abyss.getRecaptchaCheck()
		})
	}, e.emailAuthCheckInit = function() {
		i("#resend").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_FIND_RESEND")) && (i("#hdnIsResend").val("true"), i("#resendForm").submit())
		})
	};
	var r = function() {
			for (var e, t = document.querySelectorAll(".js-leftTabMenus li"), a = 0; a < t.length; a++)
				if (e = t[a].getAttribute("data-navregexp"), new RegExp(e, "i").test(location.href)) {
					t[a].classList.add("active");
					break
				}
		},
		l = function() {
			var e = i(".top_tab_nav"),
				t = e.next(".tab_container"),
				a = e.find("> ul > li > a");
			i(a).on("click", function() {
				var e = i(this).parent().index();
				a.parent().removeClass("active"), i(this).parent().addClass("active"), t.find("> div").removeClass("active"), t.find("> div").eq(e).addClass("active")
			})
		},
		u = function() {
			var e = i(".acoin_return_info"),
				t = i(".btn_more_js");
			i(t).on("click", function() {
				i(this).hasClass("active") ? e.slideUp(200, function() {
					i(this).text("NEW_WEB_MYPAGE_PAYMENT_REFUNDLIST_CANCLE_TIME_INFO").removeClass("active")
				}) : e.slideDown(200, function() {
					i(this).text("NEW_WEB_MYPAGE_PAYMENT_REFUNDLIST_FOLD").addClass("active")
				})
			})
		},
		d = function() {
			var e = i("#loginForm")[0];
			if (!_abyss.checkFieldValid(e._password, BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_PASSWORD_EMPTY"), !0)) return !1;
			e.submit()
		};
	i("#js-btnExternalCert").on("click", function() {
		i("#frmExternalCertUrl").submit()
	}), e.mobileAuthInit = function() {
		function e() {
			a.removeClass("active"), t.fadeOut(500), i("body").removeClass("overflow_hidden"), 0 == _abyss.getRecaptchaCheckString().trim().length && s()
		}
		var t, a;
		0 < i("#countryCallingCode").length && _abyss.initSelect2(), t = i(".js-modalDim"), a = t.prev(".js-modalRecapcha"), t.on("click", e), a.on("click", ".btn_close", e), a.on("click", function(e) {
			e.stopPropagation()
		});
		var n = function(e, t) {
				var a;
				switch (t) {
					case "num":
						a = /^([0-9]+)$/
				}
				for (var n, o = e.val(), s = "", i = 0; i < o.length; i++) n = null != o[i] ? o[i] : o.charAt(i), a.test(n) && (s += n);
				e.val(s)
			},
			o = function(e) {
				if (0 < i("#countryCallingCode").length) return !0;
				return /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/.test(e)
			};

		function s() {
			var t = i("#sendCode"),
				e = i("#g-recaptcha-response").val(),
				a = i("#mobile").val(),
				n = "";
			if (!t.hasClass("btn_loader") && !t.hasClass("wait"))
				if ("" == i("#hashAuth").val())
					if (0 != a.trim().length) {
						if (0 < i("#countryCallingCode").length && (n = i("#countryCallingCode").val()), !o(a)) return alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_7")), void i("#mobile").focus();
						i("#hashKey").val(""), i("#hashAuth").val(""), i.ajax({
							type: "POST",
							url: "/Account/MyInfo/SendMobileAuth",
							data: {
								_mobile: a,
								"g-recaptcha-response": e,
								_countryCallingCode: n
							},
							beforeSend: function() {
								_abyss.btnLoader("#sendCode", !1)
							},
							success: function(e) {
								null != e.message && 0 < e.message.trim().length && alert(e.message.replace(/\\n/gi, "\n")), "200" == e.code ? (t.addClass("wait"), t.text(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_MOBILEAUTH_BUTTON_4")), i("#authCode").attr("readonly", !1), i("#mobileAuth").removeClass("disabled"), i("#authInfo").css("display", ""), i(".auth_area").removeClass("hide"), i("#hashKey").val(e.hash), i("#authCode").focus(), setTimeout(function() {
									t.removeClass("wait")
								}, 3e4)) : (t.removeClass("wait"), i("#authCode").attr("readonly", !0), i("#mobileAuth").addClass("disabled"), i("#authInfo").css("display", "none"), i(".auth_area").addClass("hide")), "-10005" == e.code && function() {
									var e = i(".js-modalDim"),
										t = e.prev(".js-modalRecapcha");
									1 == _abyss.getRecaptchaCheckData() && grecaptcha.reset();
									e.fadeIn(300), t.addClass("active"), i("body").addClass("overflow_hidden")
								}()
							},
							complete: function() {
								_abyss.btnLoader("#sendCode", !0)
							},
							error: function(e) {}
						})
					} else alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MYINFO_CHECKMOBILEAUTH_EMPTY_MOBILE"));
			else alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_6"))
		}
		i("#mobile").keypress(function() {
			(event.keyCode < 48 || 57 < event.keyCode) && (event.returnValue = !1)
		}).blur(function() {
			n(i(this), "num")
		}), i("#mobileSave").on("click", function() {
			return "" == i("#hashKey").val() || "" == i("#hashAuth").val() ? (alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_8")), !1) : _abyss.checkRequiredPolicy() ? void i("#mobileAuthFrm").submit() : (alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_POLICY_CHECK")), !1)
		}), i("#mobile").on("keyup", function(e) {
			13 === e.keyCode && i("#sendCode").click()
		}), i("#authCode").on("keyup", function(e) {
			13 === e.keyCode && i("#mobileAuth").click()
		}), i("#sendCode").on("click", function(e) {
			e.stopPropagation(), s()
		}), i("#mobileAuth").on("click", function() {
			var t = i(this);
			if (t.hasClass("btn_loader")) return !1;
			if ("" == i("#hashKey").val()) return !1;
			if ("" != i("#hashAuth").val()) return alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_6")), !1;
			var e = i("#authCode").val();
			if ("" == e) return alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_1")), !1;
			i.ajax({
				type: "POST",
				url: "/Account/MyInfo/CheckMobileAuth",
				data: {
					_authKey: e,
					_hashKey: i("#hashKey").val()
				},
				beforeSend: function() {
					_abyss.btnLoader("#mobileAuth", !1)
				},
				success: function(e) {
					0 < e.message.trim().length && alert(e.message.replace(/\\n/gi, "\n")), 0 == e.code ? (i("#sendCode").remove(), t.remove(), i("#mobile").attr("readonly", !0), i("#authCode").attr("readonly", !0), i("#submit").removeClass("disabled"), i("#hashAuth").val(e.hash)) : -2 == e.code || -4 == e.code ? (t.addClass("disabled"), i("#hashKey").val(""), i("#hashAuth").val(""), i("#authCode").val(""), i("#authCode").attr("readonly", !0), i("#mobileAuth").addClass("disabled"), i("#authInfo").css("display", "none")) : (i("#hashAuth").val(""), i("#authCode").val(""), i("#authCode").focus())
				},
				complete: function() {
					_abyss.btnLoader("#mobileAuth", !0)
				},
				error: function(e) {}
			})
		})
	}, e.profileAccountInit = function() {
		i("li.success").hide(), i(".icon_box .js-openProfile").on("click", function(e) {
			var t = i("#profile_popup");
			t.hasClass("active") ? t.removeClass("active") : (t.addClass("active"), t.find(".character_wrap").scrollTop(0))
		}), i("#profile_popup .js-selectProfile").on("click", function(e) {
			var t = i("#profile_popup .character_list .js-choiceBtn.active").data("profileimageno"),
				a = i("#profile_popup .character_list .js-choiceBtn.active").data("profilefileurl");
			1 != _abyss.isEmpty(a) ? (i(".icon_box .js-openProfile .icon_character").css({
				"background-image": "url(" + a + ")"
			}), i("#profileImageNo").val(t), i("#profile_popup").removeClass("active")) : alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MYPAGE_MYINFO_SETUSERPROFILEIMAGE_NULL"))
		}), i("#profile_popup .character_list .js-choiceBtn").on("click", function(e) {
			i(".character_list .js-choiceBtn").removeClass("active"), i(this).addClass("active")
            i(".character_list .js-choiceBtn .t").removeClass("checked"), i(".character_list .js-choiceBtn .t").addClass("checked")
		}), i("#profile_popup .js-closeProfile").on("click", function(e) {
			var t = i("#profileImageNo").val();
			console.log('123   ',i("#profileImageNo").val());
			_abyss.isEmpty(t) ? i(".character_list .js-choiceBtn").removeClass("active") : i('#profile_popup .character_list .js-choiceBtn[data-profileimageno="' + t + '"]').trigger("click"), i("#profile_popup").removeClass("active")
		}), i("#btnProfileAccount").on("click", function() {
			return 0 != i("#webNickName").valid() && (0 == i("#profileImageNo").val() ? (alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_PROFILEACCOUNT_CHARACTER_SET")), !1) : void i("#frmProfileAccount").submit())
		})
	}, e.addEmailInit = function() {
		i("#addEmail").on("click", function() {
			return !_abyss.checkRequiredPolicy() || 0 < i('.addEmailPolicy input[type="checkbox"]').length && !i('input[type="checkbox"]').eq(0).is(":checked") ? (alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_POLICY_CHECK")), !1) : void 0
		})
	}, e.changeVerifiedEmail = function() {
		i("#frmChangeVerifiedEmail").on("submit", function() {
			return !_abyss.checkRequiredPolicy() || 0 < i('.addEmailPolicy input[type="checkbox"]').length && !i('input[type="checkbox"]').eq(0).is(":checked") ? (alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_POLICY_CHECK")), !1) : void 0
		})
	}, e.changeVerifiedEmailAuth = function() {
		var n = !1;
		i(".js-keyInputBox .js-inputKey").each(function(e, t) {
			var a = i(t);
			_abyss.isEmpty(a.val()) && (n = !0)
		}), n ? i("#btnKeyCheck").addClass("disabled") : i("#btnKeyCheck").removeClass("disabled"), i(document).on("click", "#btnMailSend", function() {
			var e = i("#frmAuthMailReSend");
			if ("disabled" == i("#btnMailSend").attr("disabled")) return !1;
			i("#btnMailSend").attr("disabled", "disabled"), i.ajax({
				type: "post",
				url: "/Account/MyInfo/ChangeVerifiedEmailReSendAuth",
				data: e.serialize(),
				complete: function() {
					i("#btnMailSend").removeAttr("disabled")
				},
				success: function(e) {
					alert(e.resultMsg)
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		}), i("#btnKeyCheck").on("click", function() {
			if (i(this).hasClass("disabled")) return !1;
			var e = i("#authKey1").val() + i("#authKey2").val() + i("#authKey3").val() + i("#authKey4").val() + i("#authKey5").val() + i("#authKey6").val();
			if (e.length < 6) return !1;
			i("#hdToken").val(e), i("#frmAuthMailCheck").submit()
		})
	}, e.securityInit = function() {
		i("#btnAppLogOut").on("click", function() {
			return 1 != t && (0 != confirm(BDWeb.Resource.GetResourceValue("WEB_MSG_ACCOUNT_MYINFO_PEARLAPPLOGOUT_CONFIRM")) && (t = !0, void i.ajax({
				type: "post",
				url: "/Account/MyInfo/PearlAppLogout",
				complete: function() {
					t = !1
				},
				success: function(e) {
					alert(e.resultMsg)
				},
				error: function() {
					alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL"))
				}
			})))
		}), i("#btnIpCheck").on("click", function() {
			return 1 != t && (t = !0, void i.ajax({
				type: "post",
				url: "/Account/MyInfo/UpdateSecurity",
				complete: function() {
					t = !1
				},
				success: function(e) {
					alert(e.resultMsg), 0 == e.resultCode && ("on" == i("#spanIpCheck").text().trim().toLowerCase() ? i("#spanIpCheck").text("OFF") : i("#spanIpCheck").text("ON"))
				},
				error: function() {
					alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL"))
				}
			}))
		})
	};
	var _ = function(e) {
		var t = i(".js-securityStep");
		"safe" == e ? (t.removeClass("medium weak"), t.addClass("safe"), t.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_SAFE"))) : "medium" == e ? (t.removeClass("safe weak"), t.addClass("medium"), t.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_MEDIUM"))) : "weak" == e ? (t.removeClass("safe medium"), t.addClass("weak"), t.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_WEAK"))) : (t.removeClass("safe medium weak"), t.html(""))
	};
	return l(), u(), r(), n(), o(), s(), a(), c(), _abyss.initLoginCapsLockCheck(), e
}(window._abyss.mypage || {}, jQuery);