<div>
    <!-- Plan -->
    <section aria-labelledby="plan-heading">
        <form wire:submit.prevent="createSubscription">
            <div class="shadow sm:overflow-hidden sm:rounded-lg">
                @if($subscribed)
                    <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Your Plan</h3>
                        </div>

                        <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 sm:mt-0 sm:ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $current->name }}</div>
                                    <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                        <div>Since {{ $subscription->created_at->format('F Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
                    <div class="flex justify-between">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ $subscribed ? 'Change Plan' : 'Choose Your Plan' }}</h3>

                        <div class="flex items-center gap-3">
                            <span class="ml-3 text-sm" id="annual-billing-label">
                            <span class="font-medium text-gray-900">Annual billing</span>
                            </span>
                            <button wire:click="$toggle('annualPricing')" type="button" class="{{ $annualPricing ? 'bg-blue-500' : 'bg-gray-200'}} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="annual-billing-label">
                                <span aria-hidden="true" class="{{ $annualPricing ? 'translate-x-5' : 'translate-x-0'}} inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>
                    </div>

                    <fieldset x-data="{ checked: null }">
                        <legend class="sr-only">Pricing plans</legend>
                        <div class="relative -space-y-px rounded-md bg-white">
                            @foreach($plans as $plan)
                                <label @class([
                                    "relative flex cursor-pointer flex-col border p-4 outline-none md:grid md:grid-cols-2 md:pr-6",
                                    "rounded-tl-md rounded-tr-md" => $loop->first,
                                    "rounded-bl-md rounded-br-md" => $loop->last
                                ]) @click="checked = '{{ $plan->sku }}'" x-bind:class="{ 'z-10 border-blue-200 bg-blue-50' : checked === '{{ $plan->sku }}', 'border-gray-200' : checked !== '{{ $plan->sku }}' }">
                                    <span class="flex items-center text-sm">
                                        <input type="radio" name="swapTo" wire:model.defer="swapTo" value="{{ $plan->sku }}" class="h-4 w-4 text-blue-500 border-gray-300">
                                        <span id="pricing-plans-0-label" class="ml-3 font-medium text-gray-900">{{ $plan->name }}</span>
                                    </span>
                                    <span class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                        <span class="font-medium" x-bind:class="{ 'text-blue-900' : checked === '{{ $plan->sku }}', 'text-gray-900' : checked !== '{{ $plan->sku }}' }">£{{ $annualPricing ? $plan->price_annual : $plan->price }} / mo</span>
                                    </span>
                                    <!--span class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right" x-bind:class="{ 'text-blue-700' : checked === '{{ $plan->sku }}', 'text-gray-500' : checked !== '{{ $plan->sku }}' }">
                                        {{ $plan->domains ?: 'Unlimited' }} @if($plan->domains > 1) domains @else domain @endif
                                    </span-->
                                </label>
                            @endforeach
                        </div>

                        @unless ($subscribed)
                    
 
                            <div x-cloak x-show="checked" x-transition class="mt-8 p-4 border border-gray-200 rounded-md">

                                <div>
                                    <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">Billing details</h2>
                                </div>
        
                                <div class="mt-6 grid grid-cols-4 gap-6">
                                    <!-- @todo store these billing address details against the customer/team in db -->
                                    <div class="col-span-4">
                                        <label for="billing_address_1" class="block text-sm font-medium leading-6 text-gray-900">Address line 1</label>
                                        <input type="text" name="billing_address_1" id="billing_address_1" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-4">
                                        <label for="billing_address_2" class="block text-sm font-medium leading-6 text-gray-900">Address line 2</label>
                                        <input type="text" name="billing_address_2" id="billing_address_2" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-2">
                                        <label for="billing_address_city" class="block text-sm font-medium leading-6 text-gray-900">Town / City</label>
                                        <input type="text" name="billing_address_city" id="billing_address_city" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-2">
                                        <label for="billing_postcode" class="block text-sm font-medium leading-6 text-gray-900">Postcode / Zip code</label>
                                        <input type="text" name="billing_postcode" id="billing_postcode" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-2">
                                        <label for="billing_country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                                        <select name="billing_country" id="billing_country" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">�land Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">C�te d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Cura�ao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">R�union</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barth�lemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB" selected="selected">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>

                                    <div class="col-span-4">
                                        <label for="cardHolderName" class="block text-sm font-medium leading-6 text-gray-900">Card holder name</label>
                                        <input type="text" name="cardHolderName" id="card-holder-name" class="mt-2 block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-4">
                                        <label class="block text-sm font-medium leading-6 text-gray-900">Card details</label>
                                        <div wire:ignore id="card-element" class="mt-2 w-full block rounded-md border-0 py-[10px] px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-700 sm:text-sm sm:leading-6"></div>
                                        <div id="card-error"></div>
                                    </div>
                                    
                                    
                                </div>

                            </div>

                        @endunless

                    </fieldset>
                </div>

                @if($subscribed)
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button wire:click.prevent="changePlan">Change Plan</x-button>
                    </div>
                @else
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button id="card-button" class="inline-flex items-center" type="submit" data-secret="{{ $intent->client_secret }}" wire:target="createSubscription" x-on:click="verify" wire:loading.attr="disabled">
                            <span>Start Subscription</span>
                            <svg wire:loading class="ml-1 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>
                    </div>
                @endif

            </div>
        </form>
    </section>


    @pushOnce('footer-scripts')
        @unless ($subscribed)
        <script>  
            /**
             * refactor.... use alpine
             * 
            **/
            const stripe = Stripe('pk_test_51MnGlmHwvhcWXVfosjk5LiLigNP20cGTQG3BJwb63donAJgJEks8lGg2H5SbBhV057BGZrSQs9uC4cyUo5rKrPYK00NnE16gZQ');
        
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                hidePostalCode: true
            });

            const billing_address_1 = document.getElementById('billing_address_1');
            const billing_address_2 = document.getElementById('billing_address_2');
            const billing_address_city = document.getElementById('billing_address_city');
            const billing_postcode = document.getElementById('billing_postcode');
            const billing_country = document.getElementById('billing_country');

            const cardHolderName = document.getElementById('card-holder-name');

            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardElement.mount('#card-element');
            cardElement.on("change", function (event) {
                cardButton.disabled = event.empty;
                document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
            });

            
            async function verify(e) {
                e.preventDefault();

                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value,
                                email: '{{ auth()->user()->email }}',
                                address: {
                                    city: billing_address_city.value,
                                    country: billing_country.value,
                                    line1: billing_address_1,
                                    line2: billing_address_2,
                                    postal_code: billing_postcode
                                }
                            }
                        }
                    }
                );
            
                if (error) {
                    console.log(error.message)
                } else {
                    console.log(setupIntent.payment_method)
                    @this.set('payment_method', setupIntent.payment_method)
                    @this.call('createSubscription')
                }
            };
        </script>
        @endunless
    @endPushOnce
</div>
