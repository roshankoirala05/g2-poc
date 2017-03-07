<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Form Fill</title>
<link rel="stylesheet" href="form.css" />
        <script type="text/JavaScript" src="formValidation.js"></script>


    </head>

    <body>
        <form name="myForm" action="data.php" id=" loginForm" onsubmit="return FormValidation();" method="post" style="width:720px">
            <fieldset class="Main">
                <legend align="middle">Registration</legend>
                <table>
                    <tr>
                        <td>First Name: </td>
                        <td>
                            <input type="text" name="firstName" id="firstName" value="">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <td>
                            <input type="text" name="lastName" id="lastName" value="">
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td> City: </td>
                        <td>
                            <input type="text" name="cityName" id="cityName" value="">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>State: </td>
                        <td>
                            <select name="stateName">

                            <option value="" size=30 selected> Chose a State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="VI">Virgin Islands</option>
                            <option value="WA">Washington</option>
                            <option value="DC">Washington D.C.</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td>Zipcode:</td>
                        <td>
                            <input type="text" name="zipCode" id="zipCode" value="">
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td>Country:</td>
                        <td>
                            <input type="text" name="countryName" id="countryName" value="">
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td>No. in Party:</td>
                        <td>
                            <input type="text" name="noInParty" id="noInParty" value="">
                            <br>
                        </td>
                    </tr>
                </table>
                <div id="fieldName">
                    <fieldset class="TravelingFor">

                        <legend align="middle">Traveling for :</legend>
                        <div class="containerTravelingFor">

                            <label class="radio-inline">
                            <input type="radio" name="TravelingFor" value="Business" checked>Business
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="TravelingFor" value="Pleasure">Pleasure
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="TravelingFor" value="convention">Convention
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="TravelingFor" value="Other">Other
                        </label>
                        </div>
                    </fieldset>
                    <fieldset class="HowDidYouHear">

                        <legend>How did you hear about the Monroe West Monroe CVB?</legend>
                        <div class="containerHowDid">
                            <label class="radio-inline">
                            <input type="radio" name="HowDidYouHear" value="Billboard" checked>Billboard
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="HowDidYouHear" value="Interstate Signs">Interstate Signs
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="HowDidYouHear" value="Others"> Others
                        </label>
                        </div>
                    </fieldset>

                    <fieldset class="DidYouStayMonroe" style="text-align:center">

                        <legend> Did you stay in a Monroe-West Monroe hotel? </legend>
                        <div class="DidYouStay">
                            <label class="radio-inline">
                            <input type="radio" name="DidYouStay" value="Yes" checked> Yes
                        </label>
                            <label class="radio-inline">
                            <input type="radio" name="DidYouStay" value="No" /> No
                        </label>

                        </div>
                    </fieldset>
                </div>

                <div style="text-align:center">
                    <input type="submit" style="background: green; width:100px" onclick="FormValidation();" />
                    <input type="reset" style="background: red; width: 100px" value="Clear Form" class="rounded">
                </div>

            </fieldset>
        </form>

    </body>

</html>
