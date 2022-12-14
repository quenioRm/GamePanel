window._abyss = window._abyss || {}, window._abyss.login = function(e, p) {
	function f() {
		function e(e) {
			e.getModifierState && (e.getModifierState("CapsLock") ? n.removeClass("hide") : n.addClass("hide"))
		}
		var t = p(".js-capslockWrap"),
			n = t.find(".js-btnCapslock"),
			o = t.find('input[type="password"]');
		o.length && (o[0].addEventListener("keydown", e), o[0].addEventListener("keyup", e), o[0].addEventListener("click", e), o[0].addEventListener("focus", e), o[0].addEventListener("blur", e)), o.on("focusout", function(e) {
			n.addClass("hide")
		}), n.on("mouseover", function(e) {
			p(this).siblings(".balloon_box").addClass("on")
		}), n.on("mouseleave", function(e) {
			p(this).siblings(".balloon_box").removeClass("on")
		})
	}
	var b = null;
	return e.loginInit = function() {
		var t, e, n, o, i, s, a, r, c = p(".js-tabMenu li"),
			l = p(".js-tabContents"),
			u = p(".js-passShow");

		// function d() {
		// 	s.offset().left + i.position().left < p(window).width() - a.outerWidth() - 7 ? a.css("left", i.position().left - 1) : a.css("left", p(window).width() - a.outerWidth() - 7 - s.offset().left), r.css("left", i.position().left - a.position().left + .2 * i.width() - .5 * r.width())
		// }
		window.onpageshow = function(e) {
			(e.persisted || window.performance && 2 == window.performance.navigation.type) && _abyss.btnLoaderAction("#btnLogin", !0)
		}, p("#_email").focus(), c.on("click", function() {
			var e = p(this);
			t = c.index(this), e.addClass("active"), e.siblings().removeClass("active"), l.removeClass("active"), l.eq(t).addClass("active")
		}), p(".js-sns").on("click", function() {
			var e, t, n, o, i = p(this).data("type"),
				s = p("#isIpCheck").is(":checked");
			null != i && (e = p(this).data("type"), t = s, n = window.screen.width / 2 - 225, o = window.screen.height / 2 - 300, null != b && b.close(), b = window.open("/Member/OAuth/" + e + "?returnUrl=" + encodeURIComponent(p("#hdReturnUrl").val()) + "&mac=&isIpCheck=" + t, "", "width=450px,height=600px,top=" + o + ",left=" + n), window.focus && b.focus())
		}), p("#btnSteam").on("click", function() {
			var e;
			e = "https://steamcommunity.com/openid/login?", e += "openid.ns=" + encodeURIComponent("http://specs.openid.net/auth/2.0"), e += "&openid.mode=checkid_setup", e += "&openid.return_to=" + encodeURIComponent(p("#hdAccountUrl").val() + "/Member/Steam/Login?_returnUrl=" + encodeURIComponent(p("#hdReturnUrl").val())), e += "&openid.realm=" + encodeURIComponent(p("#hdAccountUrl").val()), e += "&openid.identity=" + encodeURIComponent("http://specs.openid.net/auth/2.0/identifier_select"), e += "&openid.claimed_id=" + encodeURIComponent("http://specs.openid.net/auth/2.0/identifier_select"), location.href = e
		}), p("#frmLogin").on("submit", function() {
			if (0 != p(".input-validation-error").length) return !1;
			var e = _abyss.getRecaptchaCheck();
			return e && _abyss.btnLoaderAction("#btnLogin"), e
		}), p(".custom_input").on("keyup", function() {}), p(".js-snsMore").on("click", function() {
			p(this).toggleClass("active"), p(".sns_login_more").slideToggle(200)
		}), e = ".toggle_wrap", n = ".js-balloon", i = p(".js-ipToggleWrap"), s = p(e), a = p(n), r = a.find(".balloon_square"), i.on("mouseenter", function() {
			a.addClass("on")
		}), i.on("mouseleave", function() {
			a.removeClass("on")
		}), window.addEventListener("load", function() {
			setTimeout(function() {
				1 < p("input:-webkit-autofill").length && _abyss.btnLoaderAction("#btnLogin", !0)
			}, 500)
		}), u.on("click", function() {
			var e = p(this),
				t = e.siblings("input");
			"password" === t.attr("type") ? (e.parent().addClass("open"), t.attr("type", "text"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_HIDE"))) : (e.parent().removeClass("open"), t.attr("type", "password"), e.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")))
		}), u.attr("title", BDWeb.Resource.GetResourceValue("WEB_MEMBER_JOIN_INDEX_INPUT_PASSWORD_SHOW")), f()
	}, e.inputChangeActiveButton = function(e, t, n, o) {
		if (_abyss.isEmpty(e) || _abyss.isEmpty(t) || _abyss.isEmpty(o)) return !1;
		var i = e,
			s = t,
			a = o,
			r = n || "input-validation-error";
		null !== i.val() && !i.hasClass(r) && 10 <= a.val().length ? (s.removeClass("disabled"), s.removeAttr("disabled")) : (s.addClass("disabled"), s.attr("disabled", "disabled"))
	}, e.CheckOtpInit = function() {
		var e = p("#btnOtpCheck");
		window.onpageshow = function(e) {
			(e.persisted || window.performance && 2 == window.performance.navigation.type) && _abyss.btnLoaderAction("#btnOtpCheck", !0)
		}, _abyss.inputNumPaste(), e.on("click", function() {
			var n = !0,
				o = "";
			if (p("input[name^=otpKey]").each(function(e, t) {
					"" == p(this).val().trim() && (n = !1), o += p(this).val()
				}), 0 == n) return alert(BDWeb.Resource.GetResourceValue("WEB_MEMBER_FINDPW_AUTHCHECK_REQUIRED_AUTHKEY")), !1;
			_abyss.btnLoaderAction("#btnOtpCheck"), p("#otpCode").val(o), p("#frmLoginOTPAuth").submit()
		}), p("#btnCancel").on("click", function() {
			location.href = "/Member/Logout/Index"
		}), p("#js-externalCert").on("click", function() {
			p("#frmExternalCertUrl").submit()
		})
	}, e.CheckOtpByMobileInit = function() {
		var i;

		function t() {
			var t, n = p("#btnResendCode"),
				e = p("#frmSendOTPMobileAuth"),
				o = e.serialize();
			p.ajax({
				type: e.attr("method"),
				url: e.attr("action"),
				data: o,
				success: function(e) {
					0 == e._resultCode ? (p("#loginHashKey").val(e._hash), alert(BDWeb.Resource.GetResourceValue("WEB_MEMBER_LOGIN_CHECKOTP_SMSAUTH_CODE_SENDED")), p(".js-inputNum").each(function(e, t) {
						p(this).val("")
					}), n.removeClass("text_blue"), n.addClass("disabled"), t = 29, i = setInterval(function() {
						return t <= 0 ? (p(".js-mobileotptimer").text(""), clearInterval(i), n.removeClass("disabled"), void n.addClass("text_blue")) : void p(".js-mobileotptimer").text(".." + t--)
					}, 1e3)) : alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL"))
				}
			})
		}
		_abyss.inputNumPaste(), window.onpageshow = function(e) {
			e.persisted || window.performance && 2 == window.performance.navigation.type ? (_abyss.btnLoaderAction("#btnLoginOtpAuth", !0), p(".js-inputNum").each(function(e, t) {
				p(this).val("")
			})) : t()
		}, p("#btnLoginOtpAuth").on("click", function() {
			var n = "";
			p(".js-inputNum").each(function(e, t) {
				n += p(this).val()
			}), 6 == n.length ? (p("#loginAuthKey").val(n), 0 != p("#loginHashKey").val().trim().length ? (_abyss.btnLoaderAction("#btnLoginOtpAuth"), p("#frmLoginOTPAuth").submit()) : alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL"))) : alert(BDWeb.Resource.GetResourceValue("WEB_MYPAGE_MYINFO_CHECKMOBILEAUTH_MSG_1"))
		}), p("#btnResendCode").on("click", function() {
			p(this).hasClass("disabled") || t()
		}), p("#btnCancel").on("click", function() {
			history.back()
		})
	}, e.DormantSendInit = function() {
		p("#btnMailSend").on("click", function() {
			confirm(BDWeb.Resource.GetResourceValue("WEB_MEMBER_DORMANT_SENDMAIL_SEND_RESEND_CONFIRM")) && p.ajax({
				type: "post",
				url: "/Member/Dormant/Send",
				data: {
					_param: p("#hdParam").val()
				},
				success: function(e) {
					alert(e.message)
				},
				error: function() {
					return alert(BDWeb.Resource.GetResourceValue("WEB_MSG_COMMON_FAIL")), !1
				}
			})
		})
	}, e
}(window._abyss.login || {}, jQuery);