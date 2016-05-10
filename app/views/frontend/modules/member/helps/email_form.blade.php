<center>
    <div
        style="
            width: 50%;
            margin-top: 200px;
        "
    >
        <form action="{{URL::to('/member/help/forget')}}" method="post" id="LoginForm"> 
            <fieldset>
                <legend>Email Form</legend>
                <div>
                    @if(Session::has('hasError'))
                        <p style="color: red;">Please provide your correct email!</p>
                    @endif
                </div>
                <div>
                    @if(Session::has('hasErrorSendMail'))
                        <p style="color: red;">
                            Email can not send!
                        </p>
                    @endif
                </div>
                <table>
                    <tr>
                        <td><label>Email: </label> </td>
                        <td>
                            {{
                                Form::input(
                                  'email',
                                   'forgetEmail',
                                   null,
                                   [
                                    'class' => 'form-control',
                                    'required'=>'required',
                                    'style' => 'height:30px;'
                                   ]
                                )
                            }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input 
                                type="submit" 
                                name="btnSubmitEmail" 
                                value="Submit" 
                                style="height:30px;" 
                            />
                            <p>
                                <a href="{{URL::to('/member/login')}}">
                                    Back to login
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
                
            </fieldset>
        </form>
    </div>
</center>
