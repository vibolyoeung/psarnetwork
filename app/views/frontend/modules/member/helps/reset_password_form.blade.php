<center>
    <div
        style="
            width: 50%;
            margin-top: 200px;
        "
    >
            <form action="{{URL::to('/member/help/reset')}}" method="post" id="LoginForm"> 
                <fieldset>
                    <legend>Reset Password Form</legend>
                    <div>
                        @if(Session::has('hasError'))
                            <p style="color: red;">{{Session::get('hasError')}}</p>
                        @endif
                    </div>
                    <table>
                        <tr>
                            <td><label>Code: </label></td>
                            <td>
                                {{
                                    Form::input(
                                      'text',
                                       'code',
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
                            <td><label>New Password: </label></td>
                            <td>
                                {{
                                    Form::input(
                                      'password',
                                       'newPassword',
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
                            <td><label>Confirm Password: </label> </td>
                            <td>
                                {{
                                    Form::input(
                                      'password',
                                       'confirmPassword',
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
                                    name="btnSubmitReset" 
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
