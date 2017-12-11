
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="login_title">
                    {{$L->__('Login and create account')}}
                </div>
            </div>
            <div style="text-align: center;font-size: 18px; color: red; font-family: 'Century Gothic Regular Bold'">
                <?=session('error_email')?>
            <?
            session()->forget('error_email');

            if(session('forget_pass')){?>
                <?=(session('forget_pass') == 'success')?$L->__('New password has been sent to Your email!'):$L->__('Email is incorrect!');

                session()->forget('forget_pass');
            }?>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="login_form form">
                    <div class="form_title">
                        {{$L->__('Registered customers')}}
                    </div>
                    @if(session()->has('login_error'))
                    <div class="login_error" style="color: red; font-size: 18px; font-weight: bold; text-align: center">
                        {{$L->__('Email_or_password_is_incorrect!')}}
                    </div>
                        <?session()->forget('login_error')?>
                    @endif
                    <form action="{{url('/admin/customer_login')}}" method="post">
                        {{csrf_field()}}
                        <label for="email_l">{{$L->__('Email address (*)')}}</label>
                        <div class="wrap_in email"><input type="email" name="email" id="email_l"></div>
                        <label for="password_l">{{$L->__('Password (*)')}}</label>
                        <div class="wrap_in password"><input type="password" name="password" id="password_l"></div>

                        <input type="submit" name="login_btn" value="{{$L->__('Login')}}">
                    </form>
                    <form action="{{url('/admin/forget_pass')}}" method="post">
                        {!! csrf_field() !!}
                        <input class="hidden_email" type="hidden" name="email">
                        <input type="hidden" name="lang" value="{{$L->lang}}">
                        <input style="
                        background: transparent;
                        padding-left: 0;
                        text-align: left;
                        font-size: 16px;
                        color: #73a4c1;
                        " type="submit" class="forget_pass_sub" value="<?=$L->__('Forgot password?')?>">
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="registry_form form">
                    <div class="form_title">
                        {{$L->__('New customers')}}
                    </div>
                    <form action="{{url('/admin/customer_register')}}" method="post">
                        {{csrf_field()}}
                        <label for="name">{{$L->__('First name (*)')}}</label>
                            <div class="wrap_in f_name"><input type="text" name="name" id="name" required></div>
                        <label for="last_name">{{$L->__('Last name (*)')}}</label>
                            <div class="wrap_in l_name"><input type="text" name="last_name" id="last_name" required></div>
                        <label for="email_r">{{$L->__('Email address (*)')}}</label>
                            <div class="wrap_in email"><input type="email" name="email_r" id="email_r" required></div>
                        <label for="password_r">{{$L->__('Password (*)')}}</label>
                            <div class="wrap_in password_first"><input type="password" name="password_r" id="password_r" required></div>
                        <label for="confirm_password">{{$L->__('Confirm password (*)')}}</label>
                            <div class="wrap_in password"><input type="password" name="confirm_password" id="confirm_password" required></div>
                        <input type="submit" name="registry_btn" id="submit_btn" value="{{$L->__('Submit1')}}">
                    </form>
                </div>
            </div>

            {{--BOTTOM BANER--}}
            <div class="col-xs-12 bottom_banner">
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                <div class="free_delivery_text_l1">
                                    {{$L->__('FREE DELIVERY')}}
                                </div>
                                <div class="free_delivery_text_l2">
                                    {{$L->__('order over $20 (rpr $2.95)')}}
                                </div>
                            </div>
                            <div class="clearfix"></div></a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item result_section col-lg-3 col-sm-6 relative">
                        <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}"><div class="result_img float_left">
                                {!!$img->__('back-money.png')!!}
                            </div>
                            <div class="result_text float_left">
                                <div class="result_text_l1">
                                    {{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span>
                                </div>
                                <div class="result_text_l2">
                                    {{$L->__('or_your money back')}}
                                </div>
                            </div>
                            <div class="clearfix"></div></a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item contact_section col-lg-3 col-sm-6 relative">
                        <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item local_store_section col-lg-3 col-sm-6 relative">
                        @if ($L->lang == 'cz')
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}"  style="max-width: 100%;"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>
                                <div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">
                                    <div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>
                                    <div class="local_store_text_l2" style="font-size: 16px;">{{$L->__('STORE FINDER')}}</div>
                                </div>
                                <div class="clearfix"></div></a>
                        @else
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>
                                <div class="local_store_text float_left">
                                    <div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>
                                    <div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>
                                </div>
                                <div class="clearfix"></div></a>
                        @endif
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script>
        var     password = document.getElementById("password_r"),
                confirm_password = document.getElementById("confirm_password");
        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>


