<style>
    .submit_q{
        width: calc(100% - 305px);
        float: right;
    }
    @media screen and (max-width: 1199px) {
      .question_form_title{
          font-size: 20px;
      }
    }
    @media screen and (max-width: 767px) {
        .question_form_title_btn {
            position: static;
            text-align: center;
            max-width: 200px;
            margin: Auto;
        }
    }
    .form_captcha{
        position: absolute;
        top: -6px;
        left: 0
    }
    @media screen and (max-width: 600px) {
        .form_captcha{
            position: relative;
            top: -6px;
            left: 0;
            width: 100%;
            display: flex;
        }
        .g-recaptcha{
            margin: auto;
        }
        .submit_q{
            width: 100%;
            float: none;
        }
    }
    @media screen and (max-width: 424px) {
        .user_image, .user_description, .answer_logo{
            width: 100%;
        }
        .user_image{
            text-align: left!important;
        }
        .user_image img{
            margin-left: 15px;
        }
        .answer_text, .user_description{
            padding: 10px 25px;
        }
    }
    @media screen and (max-width: 400px) {
        #rc-imageselect, .g-recaptcha {
            transform: scale(0.77);
            -webkit-transform: scale(0.77);
            transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
        }
        .captcha_sec{
            width: 232px;
        }
    }

</style>
<form action="/admin/ask_question" method="post" class="question_form">
    <div class="question_form_title">
        {{$L->__('question_form_title')}}
        <div class="question_form_title_btn">
            <div class="question_form_title_btn_text">
                <p>{{$L->__('question_form_title_btn_1')}}</p>
                <p>{{$L->__('question_form_title_btn_2')}}</p>
            </div>
            <div class="question_form_title_btn_pic">
                {!!$img->__('write_a_question.png')!!}
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    {{csrf_field()}}
    <div class="question_form_body">
        <input type="hidden" name="prod_id" value="{{$page->prod_id}}">
        <input type="hidden" name="lang" value="{{$L->lang}}">
        <div class="form-group q_form-group">
            <input type="text" class="q_name q_input form-control" placeholder="{{$L->__('name_q')}}*" name="name"
                   required value="{{old('name')}}">
            <div class="q_input_img">
                {!!$img->__('q_name.jpg')!!}
            </div>
        </div>
        <div class="form-group q_form-group">
            <select name="age" id="" class="q_age form-control q_input">
                <option value="-">{{$L->__('years_old')}}</option>
                @for($i=12;$i<=90;$i++)
                    <option value="{{$i}}" @if(old('age')==$i) selected  @endif>{{$i}}</option>
                @endfor
            </select>
            <div class="q_input_img">
                {!!$img->__('q_age.jpg')!!}
            </div>
        </div>
        <div class="form-group q_form-group">
            <input type="email" class="q_email q_input form-control" placeholder="{{$L->__('email_q')}}*" name="email"
                   required value="{{old('email')}}">
            <div class="q_input_img">
                {!!$img->__('q_email.jpg')!!}
            </div>
        </div>

        <div class="form-group q_form-group">
            <input type="text" class="q_title form-control q_input" placeholder="{{$L->__('title_q')}}*" name="title"
                   required value="{{old('title')}}">
            <div class="q_input_img">
                {!!$img->__('q_title.jpg')!!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <textarea name="question" class="q_question form-control" placeholder="{{$L->__('question_q')}}*"
                      required>{{old('question')}}</textarea>
        </div>
        <div style="position: relative">
            <div class="form_captcha">
                <div class="g-recaptcha" data-size="normal"
                     data-sitekey="6LcDciYUAAAAAFQQjSzK9vNU4Sspx-4373cRnYOD"></div>
            </div>
            <div class="flex submit_q">
                <div class="margin_auto q_submit">
                    {{$L->__('ask_question')}}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>


    </div>

</form>


@foreach($page->questions as $question)
    <div class="question_item">
        <div class="user_question" style="padding-left: 0;">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-xs-5 user_image" style="text-align: center; max-width: 170px;">
                    {!!$img->__('user_image.jpg')!!}
                </div>
                <div class="col-lg-9 col-sm-8 col-xs-7 user_description">
                    <span class="glyphicon glyphicon-user gray_men"></span>
                    <span class="user_details">{{$question->name}}</span>
                    <span class="pull-right q_date" style="font-style: italic; color: #494949; font-family: Century Gothic Regular;">{{$question->created_at->format("d".'/'.'m'.'/'.'Y')}}</span>
                    <div class="clearfix"></div>
                    <div class="question_title">
                        {{$question->title}}
                    </div>
                    <div class="question_text">
                        {{$question->question}}
                    </div>
                </div>
            </div>
        </div>
        <hr class="blue">
        <div class="admin_answer">
            <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-5 answer_logo" style="max-width: 170px;">
                {!!$img->__('answer_logo.jpg')!!}
            </div>
            <div class="col-lg-9 col-sm-8 col-xs-7 answer_text" style="font-family: Century Gothic Regular; padding-left: 15px">
                {!!$question->answer!!}
            </div>
            </div>
        </div>
    </div>
@endforeach


