window._abyss = window._abyss || {}, window._abyss.join = function(e, f) {
	"use strict";

	function t() {
		return navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) || 1 < navigator.maxTouchPoints
	}

	function _() {
		var a = 30,
			t = null,
			s = f(".js-email input"),
			n = f(".js-authKey"),
			i = f(".js-emailAuth");
		n.slideDown(300, function() {
			f("#authKey").focus()
		}), i.addClass("wait"), t = setInterval(function e() {
			return --a < 0 && (i.removeClass("wait"), i.on("click", function() {
				var e = f(".js-email input"),
					a = f(".js-modalDim"),
					t = a.prev(".js-modalRecapcha");
				if (0 !== b(e.val())) return !1;
				1 == _abyss.getRecaptchaCheckData() && grecaptcha.reset(), a.fadeIn(300), t.addClass("active"), f("body").addClass("overflow_hidden")
			}), clearTimeout(t), !1 === n.hasClass("complete") && (k(s, !0), k(i, !0))), e
		}(), 1e3)
	}

	function m() {
		var s = !0,
			e = f('.box_agree input[type="checkbox"][required]');
		return f.each(e, function(e, a) {
			if (!f(a).is(":checked")) {
				var t = f(a).parents(".box_agree");
				if (s = !1, t.addClass("error"), 1 <= t.find(".js-policyCheck").length) return;
				C(t)
			}
		}), s
	}

	function o(e) {
		f(".js-serviceWrap").length <= 0 || "" == e || f.ajax({
			type: "post",
			url: "/Member/Join/GetRecommendGameList",
			data: {
				nationCode: e.toUpperCase()
			},
			success: function(e) {
				var a = f(".js-country").find(".custom_select");
				if (null == e || e.length <= 0) return f(".js-serviceWrap").stop().slideUp(), a.addClass("error"), void f("#error_no_country").slideDown(300);
				a.removeClass("error"), f("#error_no_country").slideUp(300);
				var t = "";
				f("#js-gameList").empty();
				for (var s = 0; s < e.length; s++) 1 == _abyss.isEmpty(e[s]._gameServiceUrl) ? t += '<li class="service_item"><span class="item">' + e[s]._gameServiceName + "</span></li>" : t += '<li class="service_item"><a href="' + e[s]._gameServiceUrl + '" target="_blank" class="item">' + e[s]._gameServiceName + "</a></li>";
				f("#js-gameList").append(t), f(".js-serviceWrap").stop().slideDown()
			}
		})
	}

	function y() {
		var e, a = f(".js-submitActive").find('select, input[type="text"], input[type="number"], input[type="email"], input[type="password"]'),
			s = (f(".js-btnJoin"), !1);
		return a.each(function(e, a) {
			var t = f(a);
			1 != s && (!_abyss.isEmpty(t.val()) && "true" != t.attr("aria-invalid") || (s = !0))
		}), 0 == s && 0 < f('.box_agree input[type="checkbox"][required]').length && (e = f('.box_agree input[type="checkbox"][required]'), f.each(e, function(e, a) {
			if (0 == f(a).is(":checked")) return !(s = !0)
		})), "undefined" != typeof grecaptcha && grecaptcha.getResponse && 0 == grecaptcha.getResponse.length && (s = !0), 0 < f(".js-validMark").length && !f(".js-validMark").attr("data-valid") && (s = !0), !s
	}

	function r() {
		var e = f(".custom_inputBox input, .custom_select:not(.js-notErrorcustom) select");
		e.on("change", function(e) {
			e.stopPropagation();
			var a, t, s, n, i, o, r, l, c, u = f(this);
			u.removeClass("typing"), a = u, n = (new Date).getFullYear(), i = a.parents(".js-birthWrap"), o = i.find(".js-birthYear"), r = i.find(".js-birthMonth"), l = i.find(".js-birthDay"), c = parseInt(o.val()), i.length && !_abyss.isEmpty(o.val()) && (c = (c = n < c ? n : c) < 1900 ? 1900 : c, o.val(c), _abyss.isEmpty(r.val()) || _abyss.isEmpty(l.val()) || (s = (s = (t = new Date(o.val(), r.val(), 0).getDate()) < (s = parseInt(l.val())) ? t : s) < 1 ? 1 : s, l.val(s))), y()
		}), e.on("focusin", function(e) {
			var a = f(this).parents(".custom_input"),
				t = a.find(".input_validate"),
				s = t.find("span"),
				n = a.next(".bullet_list"),
				i = a.next(".balloon_box");
			t.addClass("focus"), n.stop().slideDown(300), i.addClass("on"), s.hasClass("field-validation-error") && s.addClass("visible")
		}), e.on("focusout", function(e) {
			var a = f(this),
				t = a.parents(".custom_input"),
				s = t.next(".balloon_box"),
				n = t.find(".input_validate"),
				i = n.find("span");
			s.removeClass("on"), a.removeClass("typing"), a.valid() || (!_abyss.isEmpty(a.val()) || a.valid() || i.hasClass("visible") ? a.valid() || n.stop().slideDown(300) : (n.stop().slideUp(0).stop().slideDown(300), i.addClass("visible")))
		}), e.on("keydown keypress keyup", function(e) {
			e.stopPropagation();
			var a = 300,
				t = f(this),
				s = t.parent().siblings(".input_validate"),
				n = s.find("span");
			if (t.valid()) return s.stop().slideUp(a), void n.removeClass("visible");
			if (!t.hasClass("typing")) {
				if (t.addClass("typing"), _abyss.isEmpty(t.val()) && !n.hasClass("visible")) return a = 0, void s.stop().slideUp(a);
				t.valid() || n.addClass("visible")
			}
		}), 0 < f('.box_agree input[type="checkbox"][required]').length && f('.box_agree input[type="checkbox"][required]').on("change", function() {
			y()
		}), y()
	}

	function l() {
		function e() {
			if (h.html('<span class="loading_mini_circle js-btnLoader"><span class="loading_mini_core"></span></span>'), d.removeClass("active"), u.fadeOut(500), f("body").removeClass("overflow_hidden"), "" !== (c = _abyss.getRecaptchaCheckString())) return v.html("<span>" + c + "</span>"), h.html(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_EMAILAUTH")), !1;
			var e, a, t, s, n, i, o, r, l;
			0 === (e = p.val(), a = f("#g-recaptcha-response").val(), t = f(".js-email input"), s = f(".js-emailAuth"), n = f(".js-authCheck"), i = f(".js-authKey input"), o = 0, r = f(".js-emailCheckResult"), l = f('input[name="_token"]'), f.ajax({
				type: "post",
				url: "/Member/Join/EmailAuth",
				async: !0,
				data: {
					email: e,
					"g-recaptcha-response": a,
					token: 0 < l.length ? l.val() : ""
				},
				beforeSend: function() {
					s.html('<span class="loading_mini_circle js-btnLoader"><span class="loading_mini_core"></span></span>')
				},
				success: function(e) {
					o = e.resultCode, k(i, !0), k(n, !0), i.val(""), 0 === e.resultCode ? (r.html(" "), k(s, !1), k(t, !1), s.html(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_COMPLETE_MAIL_RESEND")), _()) : (r.html("<span>" + e.resultMsg.replace(/\\n/gi, "\n").replace(/ \\n/gi, "\n") + "</span>"), s.html(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_EMAILAUTH")))
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), s.html(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_EMAILAUTH")), !1
				}
			}), o) || h.html(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_EMAILAUTH"))
		}
		var c, u = f(".js-modalDim"),
			d = u.prev(".js-modalRecapcha"),
			p = f(".js-email input"),
			h = f(".js-emailAuth"),
			v = f(".js-emailCheckResult");
		u.on("click", e), d.on("click", ".btn_close", e), d.on("click", function(e) {
			e.stopPropagation()
		})
	}

	function c() {
		f(".js-capslockWrap").each(function(e, a) {
			function t(e) {
				e.getModifierState && (e.getModifierState("CapsLock") ? (n.removeClass("hide"), s.addClass("capslock_on")) : (n.addClass("hide"), s.removeClass("capslock_on")))
			}
			var s = f(a),
				n = s.find(".js-btnCapslock"),
				i = s.find('input[type="password"]');
			i.length && (i[0].addEventListener("keydown", t), i[0].addEventListener("keyup", t), i[0].addEventListener("click", t), i[0].addEventListener("focus", t), i[0].addEventListener("blur", t)), i.on("focusout", function(e) {
				n.addClass("hide"), s.removeClass("capslock_on")
			}), n.on("mouseover", function(e) {
				f(this).siblings(".balloon_box").addClass("on")
			}), n.on("mouseleave", function(e) {
				f(this).siblings(".balloon_box").removeClass("on")
			})
		})
	}

	function u(n) {
		var e, a, t, s, i, o, r, l, c, u, d, p, h, v, _;
		n.length <= 0 || (e = /(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/, a = /(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/, t = /(?!(?=.*&#))(((?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+=~-]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/, s = /(?!(?=.*&#))(((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+=~-])))(^[a-zA-Z0-9!@#$%^&*()_+=~-]{8,100}$)/, i = f(".js-email input"), o = f(".js-emailAuth"), r = f(".js-authKey"), l = f(".js-authKey input"), c = f(".js-authCheck"), u = f(".js-validMarkWrap"), d = f(".js-validMark"), p = f(".js-password input"), h = f(".js-passwordCheck"), v = f(".js-btnJoin"), _ = f(".js-passShow"), _abyss.inputMask(f(".js-inputMask"), {
			yearrange: {
				minyear: "1900",
				maxyear: (new Date).getFullYear() + 10
			},
			alias: !_abyss.isEmpty(f("#birthFormat")) && f("#birthFormat").val().toLowerCase(),
			showMaskOnHover: !1,
			clearMaskOnLostFocus: !1
		}), _.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")), _.on("click", function() {
			var e = f(this),
				a = e.siblings("input");
			"password" === a.attr("type") ? (e.parent().addClass("open"), a.attr("type", "text"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_HIDE"))) : (e.parent().removeClass("open"), a.attr("type", "password"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")))
		}), o.on("click", function() {
			var e = f(".js-modalDim"),
				a = e.prev(".js-modalRecapcha");
			if (0 != b(i.val())) return !1;
			1 == _abyss.getRecaptchaCheckData() && grecaptcha.reset(), e.fadeIn(300), a.addClass("active"), f("body").addClass("overflow_hidden")
		}), i.on("keyup change paste input propertychange", function(e) {
			k(l), k(c), l.val(""), l.removeClass("active"), 9 !== e.keyCode && (!0 === f(this).valid() ? k(o, !0) : k(o)), 13 === e.keyCode && "disabled" !== o.attr("disabled") && o.trigger("click")
		}), r.find("input").on("keypress keyup", function() {
			var e = f(this);
			6 < e.val().length && e.val(e.val().slice(0, 6))
		}), r.find("input").on("keydown", function(e) {
			13 === e.keyCode && c.trigger("click")
		}), c.on("click", function() {
			var e, a, t;
			0 === (e = i.val(), a = r.find("input").val(), t = 0, f.ajax({
				type: "post",
				url: "/Member/Join/joinMailAuth",
				async: !1,
				data: {
					email: e,
					authKey: a
				},
				success: function(e) {
					// alert(), t = e.resultCode
					Swal.fire({
						position: 'center',
						icon: 'success',
						// background: '#fff',
						title: e.resultMsg.replace(/\\n/gi, "\n").replace(/ \\n/gi, "\n"),
						showConfirmButton: false,
						timer: 2500
					})
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			}), t) ? (k(i), k(c), k(o), k(u), setTimeout(function() {
				p.focus().select()
			}, 500), u.addClass("on"), d.attr("data-valid", "true"), y(), r.addClass("complete"), o.addClass("hide")) : r.find("input").focus()
		}), p.parent(".custom_inputBox").append('<span class="js-securityStep"></span>'), p.on("keyup", function() {
			0 == f(this).hasClass("input-validation-error") && 1 == e.test(f(this).val()) ? h.addClass("on") : (h.removeClass("on"), h.find("input").val("")), 1 == s.test(f(this).val()) ? g("safe") : 1 == t.test(f(this).val()) ? g("medium") : 1 == a.test(f(this).val()) ? g("weak") : g()
		}), v.on("click", function() {
			n.submit()
		}), f(".box_agree").find("input[type=checkbox]").on("keyup", function(e) {
			13 === e.keyCode && f(this).trigger("click")
		}), f('.box_agree input[type="checkbox"][required]').on("change", function(e) {
			var a = f(this).parents(".box_agree");
			if (f(this).is(":checked")) {
				if (!a.hasClass("error")) return;
				a.removeClass("error"), a.find(".js-policyCheck").stop().slideUp(200)
			} else f(this).is(":checked") || (a.addClass("error"), C(a))
		}), n.on("submit", function() {
			if (0 == m()) return !1;
			if (!1 === f(this).valid()) return !1;
			if (0 < o.length && !1 === r.hasClass("complete")) return alert(BDWeb.Resource.GetResourceValue("WEB_MEMBER_LOGIN_CHECK_AUTH_MAIL")), o.focus(), !1;
			if (k(v), k(o, !1), k(i, !0, "readonly"), k(r, !0), n.attr("id").indexOf("Oauth") <= 0) return !0;
			var e = window.screen.width / 2 - 225,
				a = window.screen.height / 2 - 300;
			k(v, !0), null != s && s.close();
			var t = encodeURIComponent("/Member/Join/OauthJoin?" + n.serialize()),
				s = window.open("/Member/OAuth/" + joinType + "?returnUrl=" + t, "", "width=450px,height=600px,top=" + a + ",left=" + e);
			return window.focus && s.focus(), !1
		}), _abyss.initSelect2())
	}
	var b = function(e) {
			var a = 0,
				t = f(".js-emailCheckResult");
			return f.ajax({
				type: "post",
				url: "/Member/Join/isBlockEmailDomain",
				async: !1,
				data: {
					email: e
				},
				success: function(e) {
					0 !== (a = e.resultCode) && t.html("<span>" + e.resultMsg.replace(/\\n/gi, "\n").replace(/ \\n/gi, "\n") + "</span>")
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			}), a
		},
		C = function(e) {
			var a = e,
				t = '<div class="input_validate error js-policyCheck"><span class="field-validation-error"><span>' + BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_POLICY_CHECK") + "</span></span>";
			a.find(".js-policyCheck").length < 1 && a.append(t), a.find(".js-policyCheck").stop().slideDown(200)
		},
		a = function() {
			function n() {
				var s = !1;
				a.each(function(e, a) {
					var t = f(a);
					_abyss.isEmpty(t.val()) && (s = !0)
				}), s ? (e.addClass("disabled"), e.attr("disabled", "disabled")) : (e.removeClass("disabled"), e.removeAttr("disabled"))
			}
			var s, e = f("#btnKeyCheck"),
				a = f(".js-keyInputBox .js-inputKey");
			a.on("keydown", function(e) {
				var a = f(this),
					t = a.prev(".js-inputKey");
				s = a.val(), 13 == e.keyCode && f("#btnKeyCheck").trigger("click"), _abyss.isEmpty(s) && 8 == e.keyCode && (t.val(""), t.select())
			}), a.on("keyup", function(e) {
				var a = f(this),
					t = a.next(".js-inputKey"),
					s = a.prev(".js-inputKey");
				39 == e.keyCode && t.select(), 37 == e.keyCode && s.select(), 46 == e.keyCode && t.select(), n()
			}), a.on("input", function(e) {
				var a = f(this),
					t = a.next(".js-inputKey");
				s = a.val(), _abyss.isEmpty(s) || 8 === e.keyCode || t.select(), this.value.length > this.maxLength && (this.value = this.value.slice(0, this.maxLength))
			}), a.on("click", function(e) {
				f(e.target).select()
			});
			var i = {};
			i.key1 = f("#authKey1"), i.key2 = f("#authKey2"), i.key3 = f("#authKey3"), i.key4 = f("#authKey4"), i.key5 = f("#authKey5"), i.key6 = f("#authKey6"), i.key7 = f("#authKey7"), i.key8 = f("#authKey8"), i.key1.focus(), i.key1.on("paste", function(e) {
				var a, t = (e.clipboardData || e.originalEvent.clipboardData || window.clipboardData).getData("text"),
					s = 6;
				1 < t.length && (a = t.replace(/[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@@\#$%&\\\=\(\'\"]/gi, "").replace(/ /gi, ""), i.key1.val(a.substr(0, 1)), i.key2.val(0 < a.substr(1, 1).length ? a.substr(1, 1) : i.key2.val()), i.key3.val(0 < a.substr(2, 1).length ? a.substr(2, 1) : i.key3.val()), i.key4.val(0 < a.substr(3, 1).length ? a.substr(3, 1) : i.key4.val()), i.key5.val(0 < a.substr(4, 1).length ? a.substr(4, 1) : i.key5.val()), i.key6.val(0 < a.substr(5, 1).length ? a.substr(5, 1) : i.key6.val()), i.key7.length && (i.key7.val(0 < a.substr(6, 1).length ? a.substr(6, 1) : i.key7.val()), s++), i.key8.length && (i.key8.val(0 < a.substr(7, 1).length ? a.substr(7, 1) : i.key8.val()), s++), s <= t.length ? f("#btnKeyCheck").focus() : i["key" + t.length].focus(), n())
			})
		},
		k = function(e, a, t) {
			if (_abyss.isEmpty(e)) return !1;
			a ? (e.removeClass("disabled"), e.prop("disabled", !1)) : (e.addClass("disabled"), e.attr("disabled", "disabled")), "readonly" === t && (e.addClass("disabled"), e.attr("readonly", !0))
		},
		g = function(e) {
			BDWeb.Resource.GetResourceValue("WEB_MYPAGE_PASSWORD_INDEX_CURRENT_PASSWORD");
			var a = f(".js-securityStep");
			"safe" == e ? (a.removeClass("medium weak"), a.addClass("safe"), a.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_SAFE"))) : "medium" == e ? (a.removeClass("safe weak"), a.addClass("medium"), a.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_MEDIUM"))) : "weak" == e ? (a.removeClass("safe medium"), a.addClass("weak"), a.html(BDWeb.Resource.GetResourceValue("WEB_ACCOUNT_PASSWORD_CHECK_WEAK"))) : (a.removeClass("safe medium weak"), a.html(""))
		};
	return e.joinInit = function() {
		var e, a, t, s = f("#birthFormat").val(),
			n = f("#nationCode").val().toLowerCase(),
			i = f(".js-questionToolTip");
		u(f("#frmJoin")), u(f("#frmJoinOauth")), u(f("#frmTransferJoin")), u(f("#frmAddInformation")), e = f(".box_policy"), a = f(e).find(".MsoNormal"), null != (t = a.attr("style")) && a.attr("style", t.replace("word-break: keep-all;", "")), c(), o(n), f(".js-nationSelect").on("change", function() {
			n = f("#nationCode").val().toLowerCase();
			var e = f(".js-country").data("nation").toLowerCase();
			o(n), e !== n && alert(BDWeb.Resource.GetResourceValue("WEB_MSG_MEMBER_JOIN_INDEX_NATION_CONFIRM"))
		}), f(".js-inputMask").on("keydown", function(e) {
			9 === e.keyCode && 0 == e.shiftKey && "readonly" != f(".js-nationSelect").attr("readonly") && f(".js-country .js-nationSelect").select2("open")
		});
		f(document).on("change", 'input:not([type="hidden"])', function(e) {
			e.stopPropagation()
		}), r(), f("#birth").on("focus", function() {
			f("#birth").attr("placeholder", s)
		}), f("#birth").on("focusout", function() {
			n = f("#nationCode").val().toLowerCase(), f("#birth").removeAttr("placeholder")
		}), i.on("mouseenter focusin click", function() {
			f(this).find(".balloon_box").addClass("on")
		}), i.on("mouseleave focusout blur", function() {
			f(this).find(".balloon_box").removeClass("on")
		}), l()
	}, e.joinInitOauthChange = function() {
		f(document).on("change", 'input:not([type="hidden"])', function(e) {
			e.stopPropagation()
		}), r(), u(f("#frmJoin")), c(), l()
	}, e.joinBeforeAuthInit = function() {
		var s = !1;
		f(".js-keyInputBox .js-inputKey").each(function(e, a) {
			var t = f(a);
			_abyss.isEmpty(t.val()) && (s = !0)
		}), s ? f("#btnKeyCheck").addClass("disabled") : f("#btnKeyCheck").removeClass("disabled"), f("#btnMailSend").on("click", function() {
			var e = f("#frmAuthMailSend");
			if ("disabled" == f("#btnMailSend").attr("disabled")) return !1;
			f("#btnMailSend").attr("disabled", "disabled"), f.ajax({
				type: "post",
				url: "/Member/Join/AuthMailSend/",
				data: e.serialize(),
				complete: function() {
					f("#btnMailSend").removeAttr("disabled")
				},
				success: function(e) {
					alert(e.message)
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		}), f("#btnAuthDelete").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_COMPLETE_AUTHDELETE_CONFIRM")) && f.ajax({
				type: "post",
				url: "/Member/OauthChange/DeleteProcess",
				data: f("#frmAuthMailSend").serialize(),
				success: function(e) {
					alert(e.message), window.location.href = e.okUrl
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		}), f("#btnKeyCheck").on("click", function() {
			if (f(this).hasClass("disabled")) return !1;
			var e = f("#authKey1").val() + f("#authKey2").val() + f("#authKey3").val() + f("#authKey4").val() + f("#authKey5").val() + f("#authKey6").val();
			if (e.length < 6) return !1;
			f("#hdToken").val(e), f("#frmAuthMailCheck").submit()
		})
	}, e.joinBeforePolicyInit = function() {
		f("#btnPolicyAgree").on("click", function() {
			return !!m() && void f("#frmJoinBeforePolicy").submit()
		})
	}, e.JoinAuthCompleteInit = function() {
		var a = 3,
			t = null,
			s = document.getElementById("js-btnDone"),
			t = setInterval(function e() {
				return f(".js-timer").text(a), --a < 0 && (clearTimeout(t), s && s.click()), e
			}(), 1e3)
	}, e.joinSkinFloating = function() {
		var e, a;
		t() && f(".skin_type").addClass("isMobile"), e = f(".js-skinMovieModal").find("iframe"), a = e.attr("data-src"), f(".js-skinModalOpen").on("click", function() {
				0 == t() ? (f(".js-skinMovieModal").addClass("on"), e.attr("src", a)) : window.open(a)
			}), f(".js-skinModalClose").on("click", function() {
				f(".js-skinMovieModal").removeClass("on"), e.attr("src", "")
			}), f(".js-joinOpen").on("click", function() {
				f(".container_wrap").removeClass("close"), f(".container_wrap").addClass("on"), f(".custom_inputBox").first().find("input").focus()
			}), f(".js-joinClose").on("click", function() {
				f(".container_wrap").removeClass("on"), f(".auth_complete_skin").removeClass("opener"), f(".container_wrap").addClass("close")
			}),
			function() {
				var e = /Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent),
					a = document.getElementById("videoTag"),
					t = document.querySelector(".video_wrap");
				if ("" === a || null === a) return;
				a.addEventListener("loadeddata", function() {}), e ? (a.pause(), a.remove(), t.remove()) : a.paused && a.play(), a.classList.add("on"), window.addEventListener("mousemove", function() {
					a.paused && a.play()
				})
			}()
	}, a(), e
}(window._abyss.join || {}, jQuery);