 
<div class="col-xs-6">
<h2 class="sub-header">Subtitle</h2>
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="col-md-1">#</th>
                  <th class="col-md-2">Header</th>
                  <th class="col-md-3">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,004</td>
                </tr>
                <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,001</td>
                </tr>
                 <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,001</td>
                </tr>
              </tbody>
            </table>
          </div>
</div>
  <div class="col-xs-6">
          <h2 class="sub-header">Latest Incidents</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="col-md-1">#</th>
                  <th class="col-md-2">Header</th>
                  <th class="col-md-3">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,001</td>
                </tr>
                <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,001</td>
                </tr>
                 <tr>
                  <td class="col-md-1">1,001</td>
                  <td class="col-md-2">1,001</td>
                  <td class="col-md-3">1,001</td>
                </tr>
              </tbody>
            </table></div>


            <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <p> 
                        <a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>
                        <a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>
                        <a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        <a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>
                        <a href="http://in1.com" title="Bootply on in1.com" target="ext">In1</a>
                    </p>
                </div>
                <div class="span3">
                    <p> 
                        <a data-toggle="modal" role="button" href="#contactModal">Contact</a><br>
                        <a href="/tags">Tags</a><br>
                        <a href="/bootstrap-community">Community</a><br>
                        <a href="/upgrade">Upgrade</a><br>
                        <a href="/templates">Templates</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p> 
                        <a href="http://bootstrap.theme.cards" target="_ext" rel="nofollow" title="Free Bootstrap themes">Bootstrap Themes</a><br>
                        <a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>
                        <a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow" title="Free Bootstrap themes">BootstrapZero</a><br>
                        <a href="http://www.html5zero.com" title="Free responsive templates" target="_ext">Responsive Templates</a><br>
                        <a href="http://www.codeply.com" rel="nofollow" title="Responsive design editor" target="_ext">Codeply</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p>
                        <a href="/about#privacy">Privacy</a><br>
                        <a href="/about#terms">Terms</a><br><br>
                        <br>
                        <span class="pull-right">Copyright 2013-2018 <a href="/" title="The Bootstrap Playground">Bootply™</a></span>
                    </p>
                    
                </div>
            </div>
        </footer>
        
        <script src="/plugins/bootstrap-select.min.js"></script>
        <script data-cfasync="false" src="/codemirror/jquery.codemirror.js"></script>
        <script data-cfasync="false" src="/beautifier.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-40413119-1', 'bootply.com');
          ga('send', 'pageview');
        </script>
        <script>
        jQuery.fn.shake = function(intShakes, intDistance, intDuration, foreColor) {
            this.each(function() {
                if (foreColor && foreColor!="null") {
                    $(this).css("color",foreColor); 
                }
                $(this).css("position","relative"); 
                for (var x=1; x<=intShakes; x++) {
                $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
                .animate({left:intDistance}, ((intDuration/intShakes)/2))
                .animate({left:0}, (((intDuration/intShakes)/4)));
                $(this).css("color",""); 
            }
          });
        return this;
        };
        </script>
        <script>
        $(document).ready(function() {
        
            $('.tw-btn').fadeIn(3000);
            
            $('#btnLogin').click(function(){
                $(this).text("...");
                $.ajax({
                    url: "/loginajax",
                    type: "post",
                    data: $('#formLogin').serialize(),
                    success: function (data) {
                        //console.log('data:'+data);
                        if (data.status==1&&data.user) { //logged in
                            $('#menuLogin').hide();
                            $('#lblUsername').text(data.user.username);
                            $('#menuUser').show();
                        }
                        else {
                            $('#btnLogin').text("Login");
                            prependAlert("#spacer",data.error);
                            $('#btnLogin').shake(4,6,700,'#CC2222');
                            $('#username').focus();
                        }
                    },
                    error: function (e) {
                        $('#btnLogin').text("Login");
                        console.log('error:'+JSON.stringify(e));
                    }
                });
            });
            $('#btnRegister').click(function(){
                $(this).text("Wait..");
                $.ajax({
                    url: "/signup?format=json",
                    type: "post",
                    data: $('#formRegister').serialize(),
                    success: function (data) {
                        console.log('data:'+JSON.stringify(data));
                        if (data.status==1) {
                            $('#btnRegister').attr("disabled","disabled");
                            $('#formRegister').text('Thanks. You can now login.');
                        }
                        else {
                            prependAlert("#spacer",data.error);
                            $('#btnRegister').shake(4,6,700,'#CC2222');
                            $('#btnRegister').text("Sign Up");
                            $('#inputEmail').focus();
                        }
                    },
                    error: function (e) {
                        $('#btnRegister').text("Sign Up");
                        console.log('error:'+e);
                    }
                });
            });
            
            $('.loginFirst').click(function(){
                $('#navLogin').trigger('click');
                return false;
            });
            
            $('#btnForgotPassword').on('click',function(){
                
                if ($('#inputEmailForgot').val()==="") {
                    prependAlert("#spacer","Specify the email address.");
                }
                else {
                    $.ajax({
                        url: "/resetPassword",
                        type: "post",
                        data: $('#formForgotPassword').serializeObject(),
                        success: function (data) {
                            if (data.status==1){
                                prependAlert("#spacer",data.msg);
                                return true;
                            }
                            else {
                                prependAlert("#spacer","Your password could not be reset.");
                                return false;
                            }
                        },
                        error: function (e) {
                            console.log('error:'+e);
                        }
                    });
                }
                
            });
            
            $('#btnContact').click(function(){
                
                $.ajax({
                    url: "/contact",
                    type: "post",
                    data: $('#formContact').serializeObject(),
                    success: function (data) {
                        if (data.status==1){
                            prependAlert("#spacer","Thanks. We got your message and will get back to you shortly.");
                             $('#contactModal').modal('hide');
                            return true;
                        }
                        else {
                            prependAlert("#spacer",data.error);
                            return false;
                        }
                    },
                    error: function (e) {
                        console.log('error:'+e);
                    }
                });
                return false;
            });
            
            
            
            
            
        });
        $.fn.serializeObject = function()
        {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        var prependAlert = function(appendSelector,msg){
            $(appendSelector).after('<div class="alert alert-info alert-block affix" id="msgBox" style="z-index:1300;margin:14px!important;">'+msg+'</div>');
            $('.alert').delay(3500).fadeOut(1000);
        }
        </script>
       
        <div id="completeLoginModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Do you want to proceed?</h3>
            </div>
            <div class="modal-body">
                <p>This page must be refreshed to complete your login.</p>
                <p>You will lose any unsaved work once the page is refreshed.</p>
                <br><br>
                <p>Click "No" to cancel the login process.</p>
                <p>Click "Yes" to continue...</p>
            </div>
            <div class="modal-footer">
              <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
              <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Password Lookup</h3>
            </div>
            <div class="modal-body">
                  <form class="form form-horizontal" id="formForgotPassword">    
                  <div class="control-group">
                      <label class="control-label" for="inputEmailForgot">Email</label>
                      <div class="controls">
                          <input name="_csrf" id="token2" value="iflqlVaf-5GZZ5muQFh3QJgJ2BSdeb-yiVk4" type="hidden">
                          <input name="email" id="inputEmailForgot" placeholder="you@youremail.com" required="" type="email">
                          <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                      </div>
                  </div>
                  </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a> 	
            	<a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
            </div>
            
        </div>
        <div id="upgradeModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h4>Would you like to upgrade?</h4>
            </div>
            <div class="modal-body">
                  <p class="text-center"><strong></strong></p>
                  <h1 class="text-center">$9<small>/mo</small></h1>
                  <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
                  <p class="text-center"><img src="/assets/i_visa.png" alt="visa" width="50"> <img src="/assets/i_mc.png" alt="mastercard" width="50"> <img src="/assets/i_amex.png" alt="amex" width="50"> <img src="/assets/i_discover.png" alt="discover" width="50"> <img src="/assets/i_paypal.png" alt="paypal" width="50"></p>
            </div>
            <div class="modal-footer pull-center">
                <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
            	<a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
            	
            </div>
        </div>
        <div id="contactModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Contact Us</h3>
                <p>suggestions, questions or feedback</p>
            </div>
            <div class="modal-body">
                  <form class="form form-horizontal" id="formContact">
                      <input name="_csrf" id="token3" value="iflqlVaf-5GZZ5muQFh3QJgJ2BSdeb-yiVk4" type="hidden">
                      <div class="control-group">
                          <label class="control-label" for="inputSender">Name</label>
                          <div class="controls">
                              <input name="sender" id="inputSender" class="input-large" placeholder="Your name" type="text">
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputMessage">Message</label>
                          <div class="controls">
                              <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                          </div>
                      </div>
                      <div class="control-group">
                          <label class="control-label" for="inputEmail">Email</label>
                          <div class="controls">
                              <input name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="" type="text">
                          </div>
                      </div>
                  </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>     
                <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
            </div>
        </div>

	
	<script src="/plugins/bootstrap-pager.js"></script>
