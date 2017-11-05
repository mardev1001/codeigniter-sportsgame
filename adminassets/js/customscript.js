$(window).load(function(){ 
	var cls = $('input[name="league"]:checked').attr('class');
	if(cls== 'basketball') {
				$('.nccbb').html('<option value="" ></option><option value="0">Abilene Christian</option><option value="1">Air Force</option><option value="2">Akron</option><option value="3">Alabama</option><option value="4">Alabama A&amp;M</option><option value="5">Alabama State</option><option value="6">Albany</option><option value="7">Alcorn State</option><option value="8">American</option><option value="9">Appalachian State</option><option value="10">Arizona</option><option value="11">Arizona State</option><option value="12">Arkansas</option><option value="13">Arkansas Little Rock</option><option value="14">Arkansas Pine Bluff</option><option value="15">Arkansas State</option><option value="16">Army</option><option value="17">Auburn</option><option value="18">Austin Peay</option><option value="19">BYU</option><option value="20">Ball State</option><option value="21">Baylor</option><option value="22">Belmont</option><option value="23">Bethune-Cookman</option><option value="24">Binghamton</option><option value="25">Boise State</option><option value="26">Boston University</option><option value="27">Bowling Green</option><option value="28">Bradley</option><option value="29">Brooklyn</option><option value="30">Brown</option><option value="31">Bryant</option><option value="32">Bucknell</option><option value="33">Buffalo</option><option value="34">Butler</option><option value="35">Cal Poly</option><option value="36">Cal State Bakersfield</option><option value="37">Cal State Fullerton</option><option value="38">Cal State Northridge</option><option value="39">California</option><option value="40">Campbell</option><option value="41">Canisius</option><option value="42">Central Arkansas</option><option value="43">Central Connecticut State</option><option value="44">Central Michigan</option><option value="45">Charleston</option><option value="46">Charleston Southern</option><option value="47">Charlotte</option><option value="48">Chattanooga</option><option value="49">Chicago State</option><option value="50">Cincinnati</option><option value="51">Clemson</option><option value="52">Cleveland State</option><option value="53">Coastal Carolina</option><option value="54">Colgate</option><option value="55">Colorado</option><option value="56">Colorado State</option><option value="57">Columbia</option><option value="58">Coppin State</option><option value="59">Cornell</option><option value="60">Creighton</option><option value="61">Dartmouth</option><option value="62">Davidson</option><option value="63">Dayton</option><option value="64">DePaul</option><option value="65">Delaware</option><option value="66">Delaware State</option><option value="67">Denver</option><option value="68">Detroit</option><option value="69">Drake</option><option value="70">Drexel</option><option value="71">Duke</option><option value="72">Duquesne</option><option value="73">East Carolina</option><option value="74">East Tennessee State</option><option value="75">Eastern Illinois</option><option value="76">Eastern Kentucky</option><option value="77">Eastern Michigan</option><option value="78">Eastern Washington</option><option value="79">Elon</option><option value="80">Evansville</option><option value="81">FIU</option><option value="82">Fairfield</option><option value="83">Fairleigh Dickinson</option><option value="84">Florida</option><option value="85">Florida A&amp;M</option><option value="86">Florida Atlantic</option><option value="87">Florida Gulf Coast</option><option value="88">Florida State</option><option value="89">Fordham</option><option value="90">Fresno State</option><option value="91">Furman</option><option value="92">Gardner-Webb</option><option value="93">George Mason</option><option value="94">George Washington</option><option value="95">Georgetown</option><option value="96">Georgia</option><option value="97">Georgia Southern</option><option value="98">Georgia State</option><option value="99">Georgia Tech</option><option value="100">Gonzaga</option><option value="101">Grambling State</option><option value="102">Grand Canyon</option><option value="103">Green Bay</option><option value="104">Hampton</option><option value="105">Hartford</option><option value="106">Harvard</option><option value="107">Hawaii</option><option value="108">High Point</option><option value="109">Hofstra</option><option value="110">Holy Cross</option><option value="111">Houston</option><option value="112">Houston Baptist</option><option value="113">Howard</option><option value="114">IPFW</option><option value="115">IUPUI</option><option value="116">Idaho</option><option value="117">Idaho State</option><option value="118">Illinois</option><option value="119">Illinois State</option><option value="120">Incarnate Word</option><option value="121">Indiana</option><option value="122">Indiana State</option><option value="123">Iona</option><option value="124">Iowa</option><option value="125">Iowa State</option><option value="126">Jackson State</option><option value="127">Jacksonville</option><option value="128">Jacksonville State</option><option value="129">James Madison</option><option value="130">Kansas</option><option value="131">Kansas State</option><option value="132">Kennesaw State</option><option value="133">Kent State</option><option value="134">Kentucky</option><option value="135">LSU</option><option value="136">La Salle</option><option value="137">Lafayette</option><option value="138">Lamar</option><option value="139">Lehigh</option><option value="140">Liberty</option><option value="141">Lipscomb</option><option value="142">Long Beach State</option><option value="143">Longwood</option><option value="144">Louisiana Tech</option><option value="145">Louisville</option><option value="146">Loyola Chicago</option><option value="147">Loyola MD</option><option value="148">Loyola Marymount</option><option value="149">Maine</option><option value="150">Manhattan</option><option value="151">Marist</option><option value="152">Marquette</option><option value="153">Marshall</option><option value="154">Maryland</option><option value="155">McNeese State</option><option value="156">Memphis</option><option value="157">Mercer</option><option value="158">Miami</option><option value="159">Miami Ohio</option><option value="160">Michigan</option><option value="161">Michigan State</option><option value="162">Middle Tennessee</option><option value="163">Milwaukee</option><option value="164">Minnesota</option><option value="165">Miss Valley State</option><option value="166">Mississippi State</option><option value="167">Missouri</option><option value="168">Missouri State</option><option value="169">Monmouth</option><option value="170">Montana</option><option value="171">Montana State</option><option value="172">Morehead State</option><option value="173">Morgan State</option><option value="174">Mount St. Mary\'s</option><option value="175">Murray State</option><option value="176">NC State</option><option value="177">NCCU</option><option value="178">NJIT</option><option value="179">Navy</option><option value="180">Nebraska</option><option value="181">Nebraska Omaha</option><option value="182">Nevada</option><option value="183">New Hampshire</option><option value="184">New Mexico</option><option value="185">New Mexico State</option><option value="186">New Orleans</option><option value="187">Niagara</option><option value="188">Nicholls State</option><option value="189">Norfolk State</option><option value="190">North Carolina</option><option value="191">North Carolina A&amp;T</option><option value="192">North Dakota</option><option value="193">North Dakota State</option><option value="194">North Florida</option><option value="195">North Texas</option><option value="196">Northeastern</option><option value="197">Northern Arizona</option><option value="198">Northern Colorado</option><option value="199">Northern Illinois</option><option value="200">Northern Iowa</option><option value="201">Northern Kentucky</option><option value="202">Northwestern</option><option value="203">Northwstern State</option><option value="204">Notre Dame</option><option value="205">Oakland</option><option value="206">Ohio State</option><option value="207">Ohio University</option><option value="208">Oklahoma</option><option value="209">Oklahoma State</option><option value="210">Old Dominion</option><option value="211">Ole Miss</option><option value="212">Oral Roberts</option><option value="213">Oregon</option><option value="214">Oregon State</option><option value="215">Pacific</option><option value="216">Penn</option><option value="217">Penn State</option><option value="218">Pepperdine</option><option value="219">Pitt</option><option value="220">Portland</option><option value="221">Portland State</option><option value="222">Prairie View A&amp;M</option><option value="223">Presbyterian</option><option value="224">Princeton</option><option value="225">Providence</option><option value="226">Purdue</option><option value="227">Quinnipiac</option><option value="228">Radford</option><option value="229">Rhode Island</option><option value="230">Rice</option><option value="231">Richmond</option><option value="232">Rider</option><option value="233">Robert Morris</option><option value="234">Rutgers</option><option value="235">SC State</option><option value="236">SE Louisiana</option><option value="237">SE Missouri State</option><option value="238">SIU Edwardsville</option><option value="239">SMU</option><option value="240">Sacramento State</option><option value="241">Sacred Heart</option><option value="242">Saint Louis</option><option value="243">Sam Houston State</option><option value="244">Samford</option><option value="245">San Diego</option><option value="246">San Diego State</option><option value="247">San Francisco</option><option value="248">San Jose State</option><option value="249">Santa Clara</option><option value="250">Savannah State</option><option value="251">Seattle</option><option value="252">Seton Hall</option><option value="253">Siena</option><option value="254">South Alabama</option><option value="255">South Carolina</option><option value="256">South Dakota</option><option value="257">South Dakota State</option><option value="258">Southern</option><option value="259">Southern Illinois</option><option value="260">Southern Miss</option><option value="261">Southern Utah</option><option value="262">St. Bonaventure</option><option value="263">St. Francis NY</option><option value="264">St. Francis PA</option><option value="265">St. John\'s</option><option value="266">St. Joseph\'s</option><option value="267">St. Mary\'s</option><option value="268">St. Peter\'s</option><option value="269">Stanford</option><option value="270">Stephen F. Austin</option><option value="271">Stetson</option><option value="272">Stony Brook</option><option value="273">Syracuse</option><option value="274">TCU</option><option value="275">Temple</option><option value="276">Tennessee</option><option value="277">Tennessee State</option><option value="278">Tennessee Tech</option><option value="279">Texas</option><option value="280">Texas A&amp;M</option><option value="281">Texas A&amp;M</option><option value="282">Texas Southern</option><option value="283">Texas State</option><option value="284">Texas Tech</option><option value="285">Toledo</option><option value="286">Towson</option><option value="287">Troy</option><option value="288">Tulane</option><option value="289">Tulsa</option><option value="290">UAB</option><option value="291">UC Davis</option><option value="292">UC Irvine</option><option value="293">UC Riverside</option><option value="294">UC Santa Barbara</option><option value="295">UCF</option><option value="296">UCLA</option><option value="297">UConn</option><option value="298">UIC</option><option value="299">UL Lafayette</option><option value="300">UL Monroe</option><option value="301">UMBC</option><option value="302">UMES</option><option value="303">UMKC</option><option value="304">UMass</option><option value="305">UMass Lowell</option><option value="306">UNC Asheville</option><option value="307">UNC Greensboro</option><option value="308">UNC Wilmington</option><option value="309">UNLV</option><option value="310">USC</option><option value="311">USC Upstate</option><option value="312">USF</option><option value="313">UT Arlington</option><option value="314">UT Martin</option><option value="315">UT Pan American</option><option value="316">UTEP</option><option value="317">UTSA</option><option value="318">Utah</option><option value="319">Utah State</option><option value="320">Utah Valley</option><option value="321">VCU</option><option value="322">VMI</option><option value="323">Valparaiso</option><option value="324">Vanderbilt</option><option value="325">Vermont</option><option value="326">Villanova</option><option value="327">Virginia</option><option value="328">Virginia Tech</option><option value="329">Wagner</option><option value="330">Wake Forest</option><option value="331">Washington</option><option value="332">Washington State</option><option value="333">Weber State</option><option value="334">West Virginia</option><option value="335">Western Carolina</option><option value="336">Western Illinois</option><option value="337">Western Kentucky</option><option value="338">Western Michigan</option><option value="339">Wichita State</option><option value="340">William &amp; Mary</option><option value="341">Winthrop</option><option value="342">Wisconsin</option><option value="343">Wofford</option><option value="344">Wright State</option><option value="345">Wyoming</option><option value="346">Xavier</option><option value="347">Yale</option><option value="348">Youngstown State</option>');
	} else if(cls== 'football') {
				$('.nccbb').html('<option value="" ></option><option value="0">Air Force</option><option value="1">Akron</option><option value="2">Alabama</option><option value="3">Alabama A&amp;M</option><option value="4">Alabama State</option><option value="5">Albany</option><option value="6">Alcorn State</option><option value="7">Allen (SC)</option><option value="8">American</option><option value="9">Appalachian St</option><option value="10">Arizona</option><option value="11">Arizona State</option><option value="12">Ark-Pine Bluff</option><option value="13">Arkansas</option><option value="14">Arkansas State</option><option value="15">Army</option><option value="16">Auburn</option><option value="17">Austin Peay</option><option value="18">BYU</option><option value="19">Bacone College</option><option value="20">Ball State</option><option value="21">Baylor</option><option value="22">Bethel-TN</option><option value="23">Bethune-Cookman</option><option value="24">Blue</option><option value="25">Boise State</option><option value="26">Boston College</option><option value="27">Bowling Green</option><option value="28">Brown</option><option value="29">Bryant</option><option value="30">Bucknell</option><option value="31">Buffalo</option><option value="32">Butler</option><option value="33">Cal Poly</option><option value="34">California</option><option value="35">Campbell</option><option value="36">Campbellsville</option><option value="37">Canisius</option><option value="38">Cent Conn St</option><option value="39">Central Arkansas</option><option value="40">Central Mich</option><option value="41">Char Southern</option><option value="42">Charlotte</option><option value="43">Chattanooga</option><option value="44">Cincinnati</option><option value="45">Citadel</option><option value="46">Clemson</option><option value="47">Coastal Carolina</option><option value="48">Colgate</option><option value="49">Colorado</option><option value="50">Colorado State</option><option value="51">Columbia</option><option value="52">Concordia (AL)</option><option value="53">Connecticut</option><option value="54">Cornell</option><option value="55">Cumberland-KY</option><option value="56">Cumberland-TN</option><option value="57">Dartmouth</option><option value="58">Davidson</option><option value="59">Dayton</option><option value="60">Delaware</option><option value="61">Delaware State</option><option value="62">Drake</option><option value="63">Duke</option><option value="64">Duquesne</option><option value="65">East Carolina</option><option value="66">East Tenn St</option><option value="67">East-HBCU</option><option value="68">East-Las Vegas</option><option value="69">Eastern Ill</option><option value="70">Eastern Ky</option><option value="71">Eastern Mich</option><option value="72">Eastern Wash</option><option value="73">Edward Waters</option><option value="74">Elon</option><option value="75">FIU</option><option value="76">Fairfield</option><option value="77">Fla Atlantic</option><option value="78">Florida</option><option value="79">Florida A&amp;M</option><option value="80">Florida State</option><option value="81">Fordham</option><option value="82">Fresno State</option><option value="83">Furman</option><option value="84">Ga Southern</option><option value="85">Gardner-Webb</option><option value="86">Georgetown</option><option value="87">Georgetown (KY)</option><option value="88">Georgia</option><option value="89">Georgia State</option><option value="90">Georgia Tech</option><option value="91">Grambling St</option><option value="92">Gray</option><option value="93">Hampton</option><option value="94">Harvard</option><option value="95">Hawaii</option><option value="96">Hofstra</option><option value="97">Holy Cross</option><option value="98">Houston</option><option value="99">Houston Baptist</option><option value="100">Howard</option><option value="101">Hula-East (Aina)</option><option value="102">Hula-West (Kai)</option><option value="103">IA All-Stars (Green)</option><option value="104">IAA All-Stars (Red)</option><option value="105">Idaho</option><option value="106">Idaho State</option><option value="107">Illinois</option><option value="108">Illinois State</option><option value="109">Incarnate Word</option><option value="110">Indiana</option><option value="111">Indiana State</option><option value="112">Iona</option><option value="113">Iowa</option><option value="114">Iowa State</option><option value="115">Jackson State</option><option value="116">Jacksonville</option><option value="117">Jacksonville St</option><option value="118">James Madison</option><option value="119">Kansas</option><option value="120">Kansas State</option><option value="121">Kent State</option><option value="122">Kentucky</option><option value="123">LSU</option><option value="124">La Salle</option><option value="125">Lafayette</option><option value="126">Lamar</option><option value="127">Lambuth</option><option value="128">Lehigh</option><option value="129">Liberty</option><option value="130">Louisiana</option><option value="131">Louisiana Tech</option><option value="132">Louisville</option><option value="133">Maine</option><option value="134">Marist</option><option value="135">Marshall</option><option value="136">Maryland</option><option value="137">Massachusetts</option><option value="138">McNeese State</option><option value="139">Memphis</option><option value="140">Mercer</option><option value="141">Miami-Florida</option><option value="142">Miami-Ohio</option><option value="143">Michigan</option><option value="144">Michigan State</option><option value="145">Middle Tennessee</option><option value="146">Minnesota</option><option value="147">Miss State</option><option value="148">Miss Valley St</option><option value="149">Missouri</option><option value="150">Missouri State</option><option value="151">Monmouth</option><option value="152">Montana</option><option value="153">Montana St-NO</option><option value="154">Montana State</option><option value="155">Montana Tech</option><option value="156">Montana-Western</option><option value="157">Morehead State</option><option value="158">Morgan State</option><option value="159">Morninside</option><option value="160">Morris Brown</option><option value="161">Murray State</option><option value="162">NC A&amp;T</option><option value="163">NC Central</option><option value="164">NC State</option><option value="165">Nation All-Stars</option><option value="166">National</option><option value="167">Navy</option><option value="168">Nebraska</option><option value="169">Nevada</option><option value="170">New Hampshire</option><option value="171">New Mexico</option><option value="172">New Mexico St</option><option value="173">Nicholls</option><option value="174">Norfolk State</option><option value="175">North All-Stars</option><option value="176">North Carolina</option><option value="177">North Dakota</option><option value="178">North Dakota St</option><option value="179">North Texas</option><option value="180">North-Gridiron</option><option value="181">Northeastern</option><option value="182">Northern Ariz</option><option value="183">Northern Colorado</option><option value="184">Northern Ill</option><option value="185">Northern Iowa</option><option value="186">Northwestern</option><option value="187">Northwestern St</option><option value="188">Notre Dame</option><option value="189">Ohio State</option><option value="190">Ohio U</option><option value="191">Oklahoma</option><option value="192">Oklahoma State</option><option value="193">Old Dominion</option><option value="194">Ole Miss</option><option value="195">Oregon</option><option value="196">Oregon State</option><option value="197">Palm Beach</option><option value="198">Paul Quinn</option><option value="199">Payton</option><option value="200">Penn</option><option value="201">Penn State</option><option value="202">Pittsburgh</option><option value="203">Portland State</option><option value="204">Prairie View</option><option value="205">Presbyterian</option><option value="206">Princeton</option><option value="207">Purdue</option><option value="208">Rhode Island</option><option value="209">Rice</option><option value="210">Richmond</option><option value="211">Robert Morris</option><option value="212">Robinson</option><option value="213">Rocky Mountain</option><option value="214">Rutgers</option><option value="215">SC State</option><option value="216">SE Louisiana</option><option value="217">SE Missouri St</option><option value="218">SMU</option><option value="219">SW Assemblies</option><option value="220">Sacramento St</option><option value="221">Sacred Heart</option><option value="222">Saint Peter\'s</option><option value="223">Sam Houston St</option><option value="224">Samford</option><option value="225">San Diego</option><option value="226">San Diego St</option><option value="227">San Jose St</option><option value="228">Savannah State</option><option value="229">Senior-North</option><option value="230">Senior-South</option><option value="231">Shrine-East</option><option value="232">Shrine-West</option><option value="233">Siena</option><option value="234">So Carolina</option><option value="235">So Florida</option><option value="236">South Alabama</option><option value="237">South All-Stars</option><option value="238">South Dakota</option><option value="239">South Dakota St</option><option value="240">South-Gridiron</option><option value="241">Southern Ill</option><option value="242">Southern Miss</option><option value="243">Southern Oregon</option><option value="244">Southern U</option><option value="245">Southern Utah</option><option value="246">St Ambrose</option><option value="247">St Francis-IN</option><option value="248">St Francis-PA</option><option value="249">St Marys-TX</option><option value="250">Stanford</option><option value="251">Stephen F Austin</option><option value="252">Stetson</option><option value="253">Stony Brook</option><option value="254">Syracuse</option><option value="255">TBA</option><option value="256">TCU</option><option value="257">TX-San Antonio</option><option value="258">Temple</option><option value="259">Tenn Tech</option><option value="260">Tenn-Martin</option><option value="261">Tennessee</option><option value="262">Tennessee St</option><option value="263">Texas</option><option value="264">Texas A&amp;M</option><option value="265">Texas All-Stars</option><option value="266">Texas College</option><option value="267">Texas Southern</option><option value="268">Texas State</option><option value="269">Texas Tech</option><option value="270">Texas-El Paso</option><option value="271">Toledo</option><option value="272">Towson</option><option value="273">Trinity-IL</option><option value="274">Troy</option><option value="275">Tulane</option><option value="276">Tulsa</option><option value="277">UAB</option><option value="278">UC Davis</option><option value="279">UCF</option><option value="280">UCLA</option><option value="281">ULM</option><option value="282">UNLV</option><option value="283">USC</option><option value="284">Union (KY)</option><option value="285">Utah</option><option value="286">Utah State</option><option value="287">Va Military</option><option value="288">Valparaiso</option><option value="289">Vanderbilt</option><option value="290">Villanova</option><option value="291">Virginia</option><option value="292">Virginia Tech</option><option value="293">Wagner</option><option value="294">Wake Forest</option><option value="295">Waldorf</option><option value="296">Washington</option><option value="297">Washington St</option><option value="298">Webber</option><option value="299">Weber State</option><option value="300">West Virginia</option><option value="301">West-HBCU</option><option value="302">West-Las Vegas</option><option value="303">Western Carolina</option><option value="304">Western Ill</option><option value="305">Western Ky</option><option value="306">Western Mich</option><option value="307">William &amp; Mary</option><option value="308">William Penn</option><option value="309">Wisconsin</option><option value="310">Wofford</option><option value="311">Wyoming</option><option value="312">Yale</option><option value="313">Youngstown St</option>');
} else if(cls== 'cricket') {
				$('.nccbb').html('<option value=""></option><option value="0">Arizona Cardinals</option><option value="1">Atlanta Falcons</option><option value="2">Baltimore Ravens</option><option value="3">Buffalo Bills</option><option value="4">Carolina Panthers</option><option value="5">Chicago Bears</option><option value="6">Cincinnati Bengals</option><option value="7">Cleveland Browns</option><option value="8">Dallas Cowboys</option><option value="9">Denver Broncos</option><option value="10">Detroit Lions</option><option value="11">Green Bay Packers</option><option value="12">Houston Texans</option><option value="13">Indianapolis Colts</option><option value="14">Jacksonville Jaguars</option><option value="15">Kansas City Chiefs</option><option value="16">Miami Dolphins</option><option value="17">Minnesota Vikings</option><option value="18">NY Giants</option><option value="19">NY Jets</option><option value="20">New England Patriots</option><option value="21">New Orleans Saints</option><option value="22">Oakland Raiders</option><option value="23">Philadelphia Eagles</option><option value="24">Pittsburgh Steelers</option><option value="25">San Diego Chargers</option><option value="26">San Francisco 49ers</option><option value="27">Seattle Seahawks</option><option value="28">St. Louis Rams</option><option value="29">Tampa Bay Buccaneers</option><option value="30">Tennessee Titans</option><option value="31">Washington Redskins</option>');
	} else if(cls== 'kabddi') {
			
				$('.nccbb').html('<option value="" ></option><option value="0">Atlanta</option><option value="1">Boston</option><option value="2">Charlotte</option><option value="3">Chicago</option><option value="4">Cleveland</option><option value="5">Dallas</option><option value="6">Denver</option><option value="7">Detroit</option><option value="8">Golden State</option><option value="9">Houston</option><option value="10">Indiana</option><option value="11">LA Clippers</option><option value="12">LA Lakers</option><option value="13">Memphis</option><option value="14">Miami</option><option value="15">Milwaukee</option><option value="16">Minnesota</option><option value="17">New Jersey</option><option value="18">New Orleans</option><option value="19">New York</option><option value="20">Oklahoma City</option><option value="21">Orlando</option><option value="22">Philadelphia</option><option value="23">Phoenix</option><option value="24">Portland</option><option value="25">Sacramento</option><option value="26">San Antonio</option><option value="27">Toronto</option><option value="28">Utah</option><option value="29">Washington</option>');
	} else if(cls== 'volleyball') {
				$('.nccbb').html('<option value="" ></option><option value="0">Angels</option><option value="1">Astros</option><option value="2">Athletics</option><option value="3">Blue Jays</option><option value="4">Braves</option><option value="5">Brewers</option><option value="6">Cardinals</option><option value="7">Cubs</option><option value="8">Diamondbacks</option><option value="9">Dodgers</option><option value="10">Giants</option><option value="11">Indians</option><option value="12">Mariners</option><option value="13">Marlins</option><option value="14">Mets</option><option value="15">Nationals</option><option value="16">Orioles</option><option value="17">Padres</option><option value="18">Phillies</option><option value="19">Pirates</option><option value="20">Rangers</option><option value="21">Rays</option><option value="22">Red Sox</option><option value="23">Reds</option><option value="24">Rockies</option><option value="25">Royals</option><option value="26">Tigers</option><option value="27">Twins</option><option value="28">White Sox</option><option value="29">Yankees</option>');
	}
	
});
function initiate_click(){
	var total_scroll = $(".height-table").prop("scrollHeight");
				var scrolled = 0;

				$(".height-table").scroll(function(){
					scrolled = $(this).scrollTop(); 
				});
				$('.downBtn').click(function(){
					var maxh = $(".height-table").height();
					alert(maxh);  
				 if(scrolled < maxh){
					scrolled = scrolled+200;
				     var totalscroll = scrolled; 
					if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
						window.scrollTo(0,scrolled); // first value for left offset, second value for top offset
					}else{
						$(".height-table").animate({
						  scrollTop:  scrolled
						});
					}
					if(scrolled > maxh){
						 scrolled = maxh
					}
				}
			 });
}
$(document).ready(function(){
	 var total_scroll = $("body, html").prop("scrollHeight");
				var scrolled = 0;

				$("body, html").scroll(function(){
					scrolled = $(this).scrollTop(); 
				});
				$('.downBtn').click(function(){
					var maxh = $("body, html").height();
					 /*alert(maxh);  */
				 if(scrolled < maxh){
					scrolled = scrolled+200;
				     var totalscroll = scrolled; 
					if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
						window.scrollTo(0,scrolled); // first value for left offset, second value for top offset
					}else{
						$("body, html").animate({
						  scrollTop:  scrolled
						});
					}
					if(scrolled > maxh){
						 scrolled = maxh
					}
				}
			 });
			
			$('.upBtn').click(function(){
			     if(scrolled > total_scroll){scrolled =total_scroll;}
			     if(scrolled > 0)
					{ 
						scrolled = scrolled-200;
						if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
							window.scrollTo(0,scrolled); // first value for left offset, second value for top offset
						}else{
							$("body, html").animate({
							  scrollTop:  scrolled
							});
						}
					}
			   }); 
			   
	// $('.datepicker').datepicker({dateFormat:'yy-mm-dd'});
	
	// $('.cellphone').mask('000-000-0000');
	
	$('.btn_investor').click(function(){
		$('.custom_investor').show();
		$('html,body').animate({scrollTop:$('.custom_investor').position().top},'slow');
	});	
	
	$('.hide_btn').click(function(){
		$('.custom_investor').hide();
		var splitpc = 40;
		var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
		var yy = today.getFullYear();
		var currentdate = mm+'/'+dd+'/'+yy;
		$('.splitpc').val(splitpc);
		$('.splitdate').val(currentdate);
	});
	
	$('.btn_row').click(function(){
		$('.thide_div').show();
		$('.btn_div').hide();
		$(this).hide();
	});

	$('.add_newrow').click(function(){
	  var splitpc = $('.splitpc').val();
	  var splitdate = $('.splitdate').val();
	  var trcount = $('.maintbody tr').length;
	  $('.maintbody').show();
	  $('.maintbody').append('<tr class="removetr"><td> '+ (trcount) +'</td><td>' + splitpc +'</td><td>' + splitdate + '</td><td>'+'<a class="removetd" href="javascript:void(0)">Delete</a>'+ '<input type="hidden" name="sid[]" value="'+(trcount)+'" /><input type="hidden" name="splitpc[]" value="'+splitpc+'" /><input type="hidden" name="splitdate[]" value="'+splitdate+'" /></td></tr>');
     });

	  $('table').on("click",".removetd", function(){ 
        $(this).parents('.removetr').remove();
		var i = 0;
		$('.maintbody tr').each(function(){
			$(this).find('td:first').html('&nbsp;'+i);
			i++;
		});
    });

      $('.post_row').click(function(){
    	  var tmoney =  $('input[name=tmoney]:checked').val();
          var amount = $('.amount').val();
		  var betting_year = $('.betting_year').val();
		  var betting_day = $('.betting_day').val();
		  var betting_date = $('.betting_date').val();
		  var lcarry = $('.lcarry').val();
		  var trcount =$('.secondtbody tr').length;
		  if(tmoney=='IN' && amount<='0')
		    {
			  alert('The Amount must be greater than zero');
			  return false;
		    }
		  else if(tmoney=='OUT' && amount>='0')
		    {
			  alert('The Amount must be LESS than zero for type(OUT)');
			  return false;  
		     }
		   else if(tmoney=='TRANSFER' && amount<='0')
		    {
			  alert('The Amount must be greater than zero');
			  return false;
		    }
			else 
			  {
			   $('.thide_div').hide();
		       $('.btn_div , .btn_row').show();	
			   $('.extcheck').prop('checked',true);
			   $('.amount').val('0');
			   $('.lcarry').val('0');
			   var today = new Date();
			   var yy = today.getFullYear();
			   $('.betting_year').val(yy);
			   $('.secondtbody').show();
			   $('.secondtbody').append('<tr class="removetr"><td>' + tmoney +'</td><td>' + amount +'</td><td>' + betting_year + '</td><td>' + betting_day + '</td><td>' + betting_date + '</td><td>' + lcarry + '</td><td><a class="removetd" href="javascript:void(0)">Delete</a><input type="hidden" name="tmoney[]" value="'+tmoney+'" /><input type="hidden" name="amount[]" value="'+amount+'" /><input type="hidden" name="betting_year[]" value="'+betting_year+'" /><input type="hidden" name="betting_day[]" value="'+betting_day+'" /><input type="hidden" name="betting_date[]" value="'+betting_date+'" /><input type="hidden" name="lcarry[]" value="'+lcarry+'" /></td></tr>');
			  }
		 });
		 
		 $('.close_row').click(function(){
			$('.thide_div').hide();
		    $('.btn_div , .btn_row').show();			
		 });
		 //code for edit new bet game
		 $('.newbetday').click(function(){
			var  currentdate = $('.currentdate').val();
				$('.nextbetday').show();
				$('#before_update').show()
				$('#before_updates').show();
				$('.currentd').show();
				$('.currenty').show();
				$('.bankroll').val('35');
				$('.showcurrentday').val(currentdate);
		 });
	   $('.newbetdayday').click(function(){
		   $('#id').val('');
			var  currentdate = $('.currentdate').val();
				$('.nextbetday').show();
				$('#before_update').show();
				$('#after_update').hide();
				$('#before_updates').show();
				$('#after_updates').hide();
				tinyMCE.activeEditor.setContent('');
				$('#league').prop('checked',true);
				$('.currentd').show();
				$('.currenty').show();
				$('.bankroll').val('35');
				$('.showcurrentday').val(currentdate);
		 });
		 
		 $('.resetbetday').click(function(){
		     $('#id').val('');
			var  currentdate = $('.currentdate').val();
				$('.nextbetday').show(); 
				$('#before_update').hide();
				$('#after_update').hide();
				tinyMCE.activeEditor.setContent('');
				$('#before_updates').hide();
				$('#after_updates').hide();
				$('#opmessage').val('');
				$('#league').prop('checked',true);
				$('.currentd').show();
				$('.currenty').show();
				$('.bankroll').val('');
				$('.showcurrentday').val('');
		 });
	 
		 //code for new game and for game id
		 
		 $('.game_id').keypress(function(event){
			 
			 if(event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) 
			  {
			   alert('Invalid Game Id Only Numeric Value Allowed');
               return false;
              }
		 });

		 $('.getbetday').change(function(){
	            var betday = $(this).val();
				var base_url = window.location.origin;
                if(betday==0)
				{
					alert('Please Select Bet Day');
					return false;
				 }
                 else{
					var bid = betday; }	
                    $.ajax({
					type:'POST',
                    url:base_url+'/gamers/fetchbetData',
					dataType:'json',
                    cache: false,					
					data:{'id':bid},
					success:function(response){
                         if(response['success']){
						  var bet_year = response['success']['bet_year'];
						  var day = response['success']['day'];
						  $('.betday').text(day);
						  $('.setbetday').val(day);
						  $('.setdatetext').text(bet_year); 
						  $('.setgamedate').val(bet_year); 
						  $('#get_bet_data').html(response.html); 
						  }
						 else{
							alert(response['nobetday']); }
					   }
				  });				 
			});
			
			
		$('.home_team').change(function(){
			in_p_hidden	= $("#in_p_hidden").val();
			if(in_p_hidden=='y'){
				disy	=	"disabled";
			}else{
				disy	=	"";
			}
			$('.setpickvalue').html('');  
				var home_team = $(this).find('option:selected').text();
				var home_teamval = $(this).val();
                
				$('.gethome_teamval').val(home_teamval);
				$('.gethome_team').val(home_team);
				var msg = '<option value="">Select Pick</option>';
				 msg += '<option value="' + home_teamval + '" '+disy+'>' + home_team + '</option>';
	            var away_team = $(".away_team option:selected").text();
                var away_teamval = $(".away_team").val();
				 if(away_teamval !='')
				   {
					 msg += '<option value="' + away_teamval + '" '+disy+'>' + away_team + '</option>';
				   }
				
				$('.setpickvalue').html(msg);   
 }); 
			
			$('.away_team').change(function(){
					in_p_hidden	= $("#in_p_hidden").val();
			if(in_p_hidden=='y'){
				disy	=	"disabled";
			}else{
				disy	=	"";
			}
				$('.setpickvalue').html('');  
				var away_team = $(this).find('option:selected').text();
				var away_teamval = $(this).val();
      			$('.getaway_teamval').val(away_teamval);
				$('.getaway_team').val(away_team); 
				var msg2 = '<option value="">Select Pick</option>';
				 msg2 += '<option value="' + away_teamval + '" '+disy+'>' + away_team + '</option>';
			    var home_team = $(".home_team option:selected").text();
                var home_teamval = $(".home_team").val();
			 	
			 if(home_teamval !='')
				{
					 msg2 += '<option value="' + home_teamval + '" '+disy+'>' + home_team + '</option>';
				}  

				$('.setpickvalue').html(msg2);   
			});
			
			//code for change team on ckecked team 
			
			$('.basketball').click(function(){
				$('.nccaa').hide();
				$('.nccbb').show();
				$('.nffll').hide();
				$('.nbbaa').hide();
				$('.mllbb').hide();
				$('.setpickvalue').html('');
				$('.gethome_teamval').val('');
				$('.gethome_team').val('');
				$('.getaway_teamval').val('');
				$('.getaway_team').val('');
				$('.nccbb').html('');
				$('.nccbb').html('<option value="" ></option><option value="0">Abilene Christian</option><option value="1">Air Force</option><option value="2">Akron</option><option value="3">Alabama</option><option value="4">Alabama A&amp;M</option><option value="5">Alabama State</option><option value="6">Albany</option><option value="7">Alcorn State</option><option value="8">American</option><option value="9">Appalachian State</option><option value="10">Arizona</option><option value="11">Arizona State</option><option value="12">Arkansas</option><option value="13">Arkansas Little Rock</option><option value="14">Arkansas Pine Bluff</option><option value="15">Arkansas State</option><option value="16">Army</option><option value="17">Auburn</option><option value="18">Austin Peay</option><option value="19">BYU</option><option value="20">Ball State</option><option value="21">Baylor</option><option value="22">Belmont</option><option value="23">Bethune-Cookman</option><option value="24">Binghamton</option><option value="25">Boise State</option><option value="26">Boston University</option><option value="27">Bowling Green</option><option value="28">Bradley</option><option value="29">Brooklyn</option><option value="30">Brown</option><option value="31">Bryant</option><option value="32">Bucknell</option><option value="33">Buffalo</option><option value="34">Butler</option><option value="35">Cal Poly</option><option value="36">Cal State Bakersfield</option><option value="37">Cal State Fullerton</option><option value="38">Cal State Northridge</option><option value="39">California</option><option value="40">Campbell</option><option value="41">Canisius</option><option value="42">Central Arkansas</option><option value="43">Central Connecticut State</option><option value="44">Central Michigan</option><option value="45">Charleston</option><option value="46">Charleston Southern</option><option value="47">Charlotte</option><option value="48">Chattanooga</option><option value="49">Chicago State</option><option value="50">Cincinnati</option><option value="51">Clemson</option><option value="52">Cleveland State</option><option value="53">Coastal Carolina</option><option value="54">Colgate</option><option value="55">Colorado</option><option value="56">Colorado State</option><option value="57">Columbia</option><option value="58">Coppin State</option><option value="59">Cornell</option><option value="60">Creighton</option><option value="61">Dartmouth</option><option value="62">Davidson</option><option value="63">Dayton</option><option value="64">DePaul</option><option value="65">Delaware</option><option value="66">Delaware State</option><option value="67">Denver</option><option value="68">Detroit</option><option value="69">Drake</option><option value="70">Drexel</option><option value="71">Duke</option><option value="72">Duquesne</option><option value="73">East Carolina</option><option value="74">East Tennessee State</option><option value="75">Eastern Illinois</option><option value="76">Eastern Kentucky</option><option value="77">Eastern Michigan</option><option value="78">Eastern Washington</option><option value="79">Elon</option><option value="80">Evansville</option><option value="81">FIU</option><option value="82">Fairfield</option><option value="83">Fairleigh Dickinson</option><option value="84">Florida</option><option value="85">Florida A&amp;M</option><option value="86">Florida Atlantic</option><option value="87">Florida Gulf Coast</option><option value="88">Florida State</option><option value="89">Fordham</option><option value="90">Fresno State</option><option value="91">Furman</option><option value="92">Gardner-Webb</option><option value="93">George Mason</option><option value="94">George Washington</option><option value="95">Georgetown</option><option value="96">Georgia</option><option value="97">Georgia Southern</option><option value="98">Georgia State</option><option value="99">Georgia Tech</option><option value="100">Gonzaga</option><option value="101">Grambling State</option><option value="102">Grand Canyon</option><option value="103">Green Bay</option><option value="104">Hampton</option><option value="105">Hartford</option><option value="106">Harvard</option><option value="107">Hawaii</option><option value="108">High Point</option><option value="109">Hofstra</option><option value="110">Holy Cross</option><option value="111">Houston</option><option value="112">Houston Baptist</option><option value="113">Howard</option><option value="114">IPFW</option><option value="115">IUPUI</option><option value="116">Idaho</option><option value="117">Idaho State</option><option value="118">Illinois</option><option value="119">Illinois State</option><option value="120">Incarnate Word</option><option value="121">Indiana</option><option value="122">Indiana State</option><option value="123">Iona</option><option value="124">Iowa</option><option value="125">Iowa State</option><option value="126">Jackson State</option><option value="127">Jacksonville</option><option value="128">Jacksonville State</option><option value="129">James Madison</option><option value="130">Kansas</option><option value="131">Kansas State</option><option value="132">Kennesaw State</option><option value="133">Kent State</option><option value="134">Kentucky</option><option value="135">LSU</option><option value="136">La Salle</option><option value="137">Lafayette</option><option value="138">Lamar</option><option value="139">Lehigh</option><option value="140">Liberty</option><option value="141">Lipscomb</option><option value="142">Long Beach State</option><option value="143">Longwood</option><option value="144">Louisiana Tech</option><option value="145">Louisville</option><option value="146">Loyola Chicago</option><option value="147">Loyola MD</option><option value="148">Loyola Marymount</option><option value="149">Maine</option><option value="150">Manhattan</option><option value="151">Marist</option><option value="152">Marquette</option><option value="153">Marshall</option><option value="154">Maryland</option><option value="155">McNeese State</option><option value="156">Memphis</option><option value="157">Mercer</option><option value="158">Miami</option><option value="159">Miami Ohio</option><option value="160">Michigan</option><option value="161">Michigan State</option><option value="162">Middle Tennessee</option><option value="163">Milwaukee</option><option value="164">Minnesota</option><option value="165">Miss Valley State</option><option value="166">Mississippi State</option><option value="167">Missouri</option><option value="168">Missouri State</option><option value="169">Monmouth</option><option value="170">Montana</option><option value="171">Montana State</option><option value="172">Morehead State</option><option value="173">Morgan State</option><option value="174">Mount St. Mary\'s</option><option value="175">Murray State</option><option value="176">NC State</option><option value="177">NCCU</option><option value="178">NJIT</option><option value="179">Navy</option><option value="180">Nebraska</option><option value="181">Nebraska Omaha</option><option value="182">Nevada</option><option value="183">New Hampshire</option><option value="184">New Mexico</option><option value="185">New Mexico State</option><option value="186">New Orleans</option><option value="187">Niagara</option><option value="188">Nicholls State</option><option value="189">Norfolk State</option><option value="190">North Carolina</option><option value="191">North Carolina A&amp;T</option><option value="192">North Dakota</option><option value="193">North Dakota State</option><option value="194">North Florida</option><option value="195">North Texas</option><option value="196">Northeastern</option><option value="197">Northern Arizona</option><option value="198">Northern Colorado</option><option value="199">Northern Illinois</option><option value="200">Northern Iowa</option><option value="201">Northern Kentucky</option><option value="202">Northwestern</option><option value="203">Northwstern State</option><option value="204">Notre Dame</option><option value="205">Oakland</option><option value="206">Ohio State</option><option value="207">Ohio University</option><option value="208">Oklahoma</option><option value="209">Oklahoma State</option><option value="210">Old Dominion</option><option value="211">Ole Miss</option><option value="212">Oral Roberts</option><option value="213">Oregon</option><option value="214">Oregon State</option><option value="215">Pacific</option><option value="216">Penn</option><option value="217">Penn State</option><option value="218">Pepperdine</option><option value="219">Pitt</option><option value="220">Portland</option><option value="221">Portland State</option><option value="222">Prairie View A&amp;M</option><option value="223">Presbyterian</option><option value="224">Princeton</option><option value="225">Providence</option><option value="226">Purdue</option><option value="227">Quinnipiac</option><option value="228">Radford</option><option value="229">Rhode Island</option><option value="230">Rice</option><option value="231">Richmond</option><option value="232">Rider</option><option value="233">Robert Morris</option><option value="234">Rutgers</option><option value="235">SC State</option><option value="236">SE Louisiana</option><option value="237">SE Missouri State</option><option value="238">SIU Edwardsville</option><option value="239">SMU</option><option value="240">Sacramento State</option><option value="241">Sacred Heart</option><option value="242">Saint Louis</option><option value="243">Sam Houston State</option><option value="244">Samford</option><option value="245">San Diego</option><option value="246">San Diego State</option><option value="247">San Francisco</option><option value="248">San Jose State</option><option value="249">Santa Clara</option><option value="250">Savannah State</option><option value="251">Seattle</option><option value="252">Seton Hall</option><option value="253">Siena</option><option value="254">South Alabama</option><option value="255">South Carolina</option><option value="256">South Dakota</option><option value="257">South Dakota State</option><option value="258">Southern</option><option value="259">Southern Illinois</option><option value="260">Southern Miss</option><option value="261">Southern Utah</option><option value="262">St. Bonaventure</option><option value="263">St. Francis NY</option><option value="264">St. Francis PA</option><option value="265">St. John\'s</option><option value="266">St. Joseph\'s</option><option value="267">St. Mary\'s</option><option value="268">St. Peter\'s</option><option value="269">Stanford</option><option value="270">Stephen F. Austin</option><option value="271">Stetson</option><option value="272">Stony Brook</option><option value="273">Syracuse</option><option value="274">TCU</option><option value="275">Temple</option><option value="276">Tennessee</option><option value="277">Tennessee State</option><option value="278">Tennessee Tech</option><option value="279">Texas</option><option value="280">Texas A&amp;M</option><option value="281">Texas A&amp;M</option><option value="282">Texas Southern</option><option value="283">Texas State</option><option value="284">Texas Tech</option><option value="285">Toledo</option><option value="286">Towson</option><option value="287">Troy</option><option value="288">Tulane</option><option value="289">Tulsa</option><option value="290">UAB</option><option value="291">UC Davis</option><option value="292">UC Irvine</option><option value="293">UC Riverside</option><option value="294">UC Santa Barbara</option><option value="295">UCF</option><option value="296">UCLA</option><option value="297">UConn</option><option value="298">UIC</option><option value="299">UL Lafayette</option><option value="300">UL Monroe</option><option value="301">UMBC</option><option value="302">UMES</option><option value="303">UMKC</option><option value="304">UMass</option><option value="305">UMass Lowell</option><option value="306">UNC Asheville</option><option value="307">UNC Greensboro</option><option value="308">UNC Wilmington</option><option value="309">UNLV</option><option value="310">USC</option><option value="311">USC Upstate</option><option value="312">USF</option><option value="313">UT Arlington</option><option value="314">UT Martin</option><option value="315">UT Pan American</option><option value="316">UTEP</option><option value="317">UTSA</option><option value="318">Utah</option><option value="319">Utah State</option><option value="320">Utah Valley</option><option value="321">VCU</option><option value="322">VMI</option><option value="323">Valparaiso</option><option value="324">Vanderbilt</option><option value="325">Vermont</option><option value="326">Villanova</option><option value="327">Virginia</option><option value="328">Virginia Tech</option><option value="329">Wagner</option><option value="330">Wake Forest</option><option value="331">Washington</option><option value="332">Washington State</option><option value="333">Weber State</option><option value="334">West Virginia</option><option value="335">Western Carolina</option><option value="336">Western Illinois</option><option value="337">Western Kentucky</option><option value="338">Western Michigan</option><option value="339">Wichita State</option><option value="340">William &amp; Mary</option><option value="341">Winthrop</option><option value="342">Wisconsin</option><option value="343">Wofford</option><option value="344">Wright State</option><option value="345">Wyoming</option><option value="346">Xavier</option><option value="347">Yale</option><option value="348">Youngstown State</option>');
			});
			
			$('.football').click(function(){
				$('.nccaa').show();
				$('.nffll').hide();
				$('.nbbaa').hide();
				$('.mllbb').hide();
				$('.setpickvalue').html('');
				$('.gethome_teamval').val('');
				$('.gethome_team').val('');
				$('.getaway_teamval').val('');
				$('.getaway_team').val('');
				$('.nccbb').html('<option value="" ></option><option value="0">Air Force</option><option value="1">Akron</option><option value="2">Alabama</option><option value="3">Alabama A&amp;M</option><option value="4">Alabama State</option><option value="5">Albany</option><option value="6">Alcorn State</option><option value="7">Allen (SC)</option><option value="8">American</option><option value="9">Appalachian St</option><option value="10">Arizona</option><option value="11">Arizona State</option><option value="12">Ark-Pine Bluff</option><option value="13">Arkansas</option><option value="14">Arkansas State</option><option value="15">Army</option><option value="16">Auburn</option><option value="17">Austin Peay</option><option value="18">BYU</option><option value="19">Bacone College</option><option value="20">Ball State</option><option value="21">Baylor</option><option value="22">Bethel-TN</option><option value="23">Bethune-Cookman</option><option value="24">Blue</option><option value="25">Boise State</option><option value="26">Boston College</option><option value="27">Bowling Green</option><option value="28">Brown</option><option value="29">Bryant</option><option value="30">Bucknell</option><option value="31">Buffalo</option><option value="32">Butler</option><option value="33">Cal Poly</option><option value="34">California</option><option value="35">Campbell</option><option value="36">Campbellsville</option><option value="37">Canisius</option><option value="38">Cent Conn St</option><option value="39">Central Arkansas</option><option value="40">Central Mich</option><option value="41">Char Southern</option><option value="42">Charlotte</option><option value="43">Chattanooga</option><option value="44">Cincinnati</option><option value="45">Citadel</option><option value="46">Clemson</option><option value="47">Coastal Carolina</option><option value="48">Colgate</option><option value="49">Colorado</option><option value="50">Colorado State</option><option value="51">Columbia</option><option value="52">Concordia (AL)</option><option value="53">Connecticut</option><option value="54">Cornell</option><option value="55">Cumberland-KY</option><option value="56">Cumberland-TN</option><option value="57">Dartmouth</option><option value="58">Davidson</option><option value="59">Dayton</option><option value="60">Delaware</option><option value="61">Delaware State</option><option value="62">Drake</option><option value="63">Duke</option><option value="64">Duquesne</option><option value="65">East Carolina</option><option value="66">East Tenn St</option><option value="67">East-HBCU</option><option value="68">East-Las Vegas</option><option value="69">Eastern Ill</option><option value="70">Eastern Ky</option><option value="71">Eastern Mich</option><option value="72">Eastern Wash</option><option value="73">Edward Waters</option><option value="74">Elon</option><option value="75">FIU</option><option value="76">Fairfield</option><option value="77">Fla Atlantic</option><option value="78">Florida</option><option value="79">Florida A&amp;M</option><option value="80">Florida State</option><option value="81">Fordham</option><option value="82">Fresno State</option><option value="83">Furman</option><option value="84">Ga Southern</option><option value="85">Gardner-Webb</option><option value="86">Georgetown</option><option value="87">Georgetown (KY)</option><option value="88">Georgia</option><option value="89">Georgia State</option><option value="90">Georgia Tech</option><option value="91">Grambling St</option><option value="92">Gray</option><option value="93">Hampton</option><option value="94">Harvard</option><option value="95">Hawaii</option><option value="96">Hofstra</option><option value="97">Holy Cross</option><option value="98">Houston</option><option value="99">Houston Baptist</option><option value="100">Howard</option><option value="101">Hula-East (Aina)</option><option value="102">Hula-West (Kai)</option><option value="103">IA All-Stars (Green)</option><option value="104">IAA All-Stars (Red)</option><option value="105">Idaho</option><option value="106">Idaho State</option><option value="107">Illinois</option><option value="108">Illinois State</option><option value="109">Incarnate Word</option><option value="110">Indiana</option><option value="111">Indiana State</option><option value="112">Iona</option><option value="113">Iowa</option><option value="114">Iowa State</option><option value="115">Jackson State</option><option value="116">Jacksonville</option><option value="117">Jacksonville St</option><option value="118">James Madison</option><option value="119">Kansas</option><option value="120">Kansas State</option><option value="121">Kent State</option><option value="122">Kentucky</option><option value="123">LSU</option><option value="124">La Salle</option><option value="125">Lafayette</option><option value="126">Lamar</option><option value="127">Lambuth</option><option value="128">Lehigh</option><option value="129">Liberty</option><option value="130">Louisiana</option><option value="131">Louisiana Tech</option><option value="132">Louisville</option><option value="133">Maine</option><option value="134">Marist</option><option value="135">Marshall</option><option value="136">Maryland</option><option value="137">Massachusetts</option><option value="138">McNeese State</option><option value="139">Memphis</option><option value="140">Mercer</option><option value="141">Miami-Florida</option><option value="142">Miami-Ohio</option><option value="143">Michigan</option><option value="144">Michigan State</option><option value="145">Middle Tennessee</option><option value="146">Minnesota</option><option value="147">Miss State</option><option value="148">Miss Valley St</option><option value="149">Missouri</option><option value="150">Missouri State</option><option value="151">Monmouth</option><option value="152">Montana</option><option value="153">Montana St-NO</option><option value="154">Montana State</option><option value="155">Montana Tech</option><option value="156">Montana-Western</option><option value="157">Morehead State</option><option value="158">Morgan State</option><option value="159">Morninside</option><option value="160">Morris Brown</option><option value="161">Murray State</option><option value="162">NC A&amp;T</option><option value="163">NC Central</option><option value="164">NC State</option><option value="165">Nation All-Stars</option><option value="166">National</option><option value="167">Navy</option><option value="168">Nebraska</option><option value="169">Nevada</option><option value="170">New Hampshire</option><option value="171">New Mexico</option><option value="172">New Mexico St</option><option value="173">Nicholls</option><option value="174">Norfolk State</option><option value="175">North All-Stars</option><option value="176">North Carolina</option><option value="177">North Dakota</option><option value="178">North Dakota St</option><option value="179">North Texas</option><option value="180">North-Gridiron</option><option value="181">Northeastern</option><option value="182">Northern Ariz</option><option value="183">Northern Colorado</option><option value="184">Northern Ill</option><option value="185">Northern Iowa</option><option value="186">Northwestern</option><option value="187">Northwestern St</option><option value="188">Notre Dame</option><option value="189">Ohio State</option><option value="190">Ohio U</option><option value="191">Oklahoma</option><option value="192">Oklahoma State</option><option value="193">Old Dominion</option><option value="194">Ole Miss</option><option value="195">Oregon</option><option value="196">Oregon State</option><option value="197">Palm Beach</option><option value="198">Paul Quinn</option><option value="199">Payton</option><option value="200">Penn</option><option value="201">Penn State</option><option value="202">Pittsburgh</option><option value="203">Portland State</option><option value="204">Prairie View</option><option value="205">Presbyterian</option><option value="206">Princeton</option><option value="207">Purdue</option><option value="208">Rhode Island</option><option value="209">Rice</option><option value="210">Richmond</option><option value="211">Robert Morris</option><option value="212">Robinson</option><option value="213">Rocky Mountain</option><option value="214">Rutgers</option><option value="215">SC State</option><option value="216">SE Louisiana</option><option value="217">SE Missouri St</option><option value="218">SMU</option><option value="219">SW Assemblies</option><option value="220">Sacramento St</option><option value="221">Sacred Heart</option><option value="222">Saint Peter\'s</option><option value="223">Sam Houston St</option><option value="224">Samford</option><option value="225">San Diego</option><option value="226">San Diego St</option><option value="227">San Jose St</option><option value="228">Savannah State</option><option value="229">Senior-North</option><option value="230">Senior-South</option><option value="231">Shrine-East</option><option value="232">Shrine-West</option><option value="233">Siena</option><option value="234">So Carolina</option><option value="235">So Florida</option><option value="236">South Alabama</option><option value="237">South All-Stars</option><option value="238">South Dakota</option><option value="239">South Dakota St</option><option value="240">South-Gridiron</option><option value="241">Southern Ill</option><option value="242">Southern Miss</option><option value="243">Southern Oregon</option><option value="244">Southern U</option><option value="245">Southern Utah</option><option value="246">St Ambrose</option><option value="247">St Francis-IN</option><option value="248">St Francis-PA</option><option value="249">St Marys-TX</option><option value="250">Stanford</option><option value="251">Stephen F Austin</option><option value="252">Stetson</option><option value="253">Stony Brook</option><option value="254">Syracuse</option><option value="255">TBA</option><option value="256">TCU</option><option value="257">TX-San Antonio</option><option value="258">Temple</option><option value="259">Tenn Tech</option><option value="260">Tenn-Martin</option><option value="261">Tennessee</option><option value="262">Tennessee St</option><option value="263">Texas</option><option value="264">Texas A&amp;M</option><option value="265">Texas All-Stars</option><option value="266">Texas College</option><option value="267">Texas Southern</option><option value="268">Texas State</option><option value="269">Texas Tech</option><option value="270">Texas-El Paso</option><option value="271">Toledo</option><option value="272">Towson</option><option value="273">Trinity-IL</option><option value="274">Troy</option><option value="275">Tulane</option><option value="276">Tulsa</option><option value="277">UAB</option><option value="278">UC Davis</option><option value="279">UCF</option><option value="280">UCLA</option><option value="281">ULM</option><option value="282">UNLV</option><option value="283">USC</option><option value="284">Union (KY)</option><option value="285">Utah</option><option value="286">Utah State</option><option value="287">Va Military</option><option value="288">Valparaiso</option><option value="289">Vanderbilt</option><option value="290">Villanova</option><option value="291">Virginia</option><option value="292">Virginia Tech</option><option value="293">Wagner</option><option value="294">Wake Forest</option><option value="295">Waldorf</option><option value="296">Washington</option><option value="297">Washington St</option><option value="298">Webber</option><option value="299">Weber State</option><option value="300">West Virginia</option><option value="301">West-HBCU</option><option value="302">West-Las Vegas</option><option value="303">Western Carolina</option><option value="304">Western Ill</option><option value="305">Western Ky</option><option value="306">Western Mich</option><option value="307">William &amp; Mary</option><option value="308">William Penn</option><option value="309">Wisconsin</option><option value="310">Wofford</option><option value="311">Wyoming</option><option value="312">Yale</option><option value="313">Youngstown St</option>');
			});
			
			$('.cricket').click(function(){
				$('.nccaa').hide();
				$('.nffll').show();
				$('.nbbaa').hide();
				$('.mllbb').hide();
				$('.setpickvalue').html('');
				$('.gethome_teamval').val('');
				$('.gethome_team').val('');
				$('.getaway_teamval').val('');
				$('.getaway_team').val('');
				$('.nccbb').html('<option value=""></option><option value="0">Arizona Cardinals</option><option value="1">Atlanta Falcons</option><option value="2">Baltimore Ravens</option><option value="3">Buffalo Bills</option><option value="4">Carolina Panthers</option><option value="5">Chicago Bears</option><option value="6">Cincinnati Bengals</option><option value="7">Cleveland Browns</option><option value="8">Dallas Cowboys</option><option value="9">Denver Broncos</option><option value="10">Detroit Lions</option><option value="11">Green Bay Packers</option><option value="12">Houston Texans</option><option value="13">Indianapolis Colts</option><option value="14">Jacksonville Jaguars</option><option value="15">Kansas City Chiefs</option><option value="16">Miami Dolphins</option><option value="17">Minnesota Vikings</option><option value="18">NY Giants</option><option value="19">NY Jets</option><option value="20">New England Patriots</option><option value="21">New Orleans Saints</option><option value="22">Oakland Raiders</option><option value="23">Philadelphia Eagles</option><option value="24">Pittsburgh Steelers</option><option value="25">San Diego Chargers</option><option value="26">San Francisco 49ers</option><option value="27">Seattle Seahawks</option><option value="28">St. Louis Rams</option><option value="29">Tampa Bay Buccaneers</option><option value="30">Tennessee Titans</option><option value="31">Washington Redskins</option>');
			});
			
			$('.kabddi').click(function(){
				$('.nccaa').hide();
				$('.nffll').hide();
				$('.nbbaa').show();
				$('.mllbb').hide();
				$('.setpickvalue').html('');
				$('.gethome_teamval').val('');
				$('.gethome_team').val('');
				$('.getaway_teamval').val('');
				$('.getaway_team').val('');
				$('.nccbb').html('<option value="" ></option><option value="0">Atlanta</option><option value="1">Boston</option><option value="2">Charlotte</option><option value="3">Chicago</option><option value="4">Cleveland</option><option value="5">Dallas</option><option value="6">Denver</option><option value="7">Detroit</option><option value="8">Golden State</option><option value="9">Houston</option><option value="10">Indiana</option><option value="11">LA Clippers</option><option value="12">LA Lakers</option><option value="13">Memphis</option><option value="14">Miami</option><option value="15">Milwaukee</option><option value="16">Minnesota</option><option value="17">New Jersey</option><option value="18">New Orleans</option><option value="19">New York</option><option value="20">Oklahoma City</option><option value="21">Orlando</option><option value="22">Philadelphia</option><option value="23">Phoenix</option><option value="24">Portland</option><option value="25">Sacramento</option><option value="26">San Antonio</option><option value="27">Toronto</option><option value="28">Utah</option><option value="29">Washington</option>');
			});
			
			$('.volleyball').click(function(){
				$('.nccaa').hide();
				$('.nffll').hide();
				$('.nbbaa').hide();
				$('.mllbb').show();
				$('.setpickvalue').html('');
				$('.gethome_teamval').val('');
				$('.gethome_team').val('');
				$('.getaway_teamval').val('');
				$('.getaway_team').val('');
				$('.nccbb').html('<option value="" ></option><option value="0">Angels</option><option value="1">Astros</option><option value="2">Athletics</option><option value="3">Blue Jays</option><option value="4">Braves</option><option value="5">Brewers</option><option value="6">Cardinals</option><option value="7">Cubs</option><option value="8">Diamondbacks</option><option value="9">Dodgers</option><option value="10">Giants</option><option value="11">Indians</option><option value="12">Mariners</option><option value="13">Marlins</option><option value="14">Mets</option><option value="15">Nationals</option><option value="16">Orioles</option><option value="17">Padres</option><option value="18">Phillies</option><option value="19">Pirates</option><option value="20">Rangers</option><option value="21">Rays</option><option value="22">Red Sox</option><option value="23">Reds</option><option value="24">Rockies</option><option value="25">Royals</option><option value="26">Tigers</option><option value="27">Twins</option><option value="28">White Sox</option><option value="29">Yankees</option>');
			});
			
			$('.setpickvalue').change(function(){
				 var picktext = $(this).find('option:selected').text();
				 var pickvalue = $(this).find('option:selected').val();
				 $('.getourpick').val(picktext);
				 $('.getpickvalue').val(pickvalue);
				
			});
			
			//code for bet days on change date
			
			$('.showcurrentday').change(function(){
				var date = new Date();
				var from2 = $(".showcurrentday").val().split("-");
				var f = new Date(from2[0],from2[1] - 1,from2[2]);
				var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
				var weekday = weekdays[f.getDay()];
				$('.currentd').text(weekday);
				$('.currentday').val(weekday);
			});
			
			
			//code for user access type
			$('.accesstype').change(function(){
		        var actype = $(this).val();
				 if(actype=='gamers')
				 {
					$('.showaccesstype').show(); 
				 }
                 else if(actype=='admin'){
					 $('.showaccesstype').hide(); 
				 }				 
		     });
			$('.getpickvalue').blur(function(){
						var val = $(this).val();
					    var awayteamval = $('.getaway_teamval').val();
					    var awayteam = $('.getaway_team').val();
					    var hometeamval = $('.gethome_teamval').val();
					    var hometeam = $('.gethome_team').val();
							
							if(awayteamval ==val)
							{
							  $('.getourpick').val(awayteam);
							}
							else if(hometeamval==val)
							{
								$('.getourpick').val(hometeam);
							}
						
					
			});
			
			$('.splashurl').blur(function(){
				var str = $('.splashurl').val();
				if(/^[a-zA-Z0]*$/.test(str) == false)
				{
					alert('Special Character Not Allowed');
				}
			});
		   var totalscroll =0 ;
         /*  $('td.loginredirect').click(function(){
			  var base_url = window.location.origin;
			  window.location.href = 'http://www.vegasfootballclub.com.php56-17.dfw3-1.websitetestlink.com/logintrack/';
		   }); */
		  
		     //code for scroll up and down
			   
		



            
            $('.inactivebetday').click(function(){
				
				var id = $(this).data('id');
			    var base_url = window.location.origin;
				$.ajax({
					  type:'POST',
					  url:base_url+'/gamedetails/previewbetData/',
					  dataType:'json',
                      cache: false, 
					  data:{'id':id},
					  success:function(output)
					  {
						 $('.height-table').html(output.html);        
      				  }
					
				});
			});

            $('.resetwonlost').click(function(){
			  if($('.resetwlp').is(':checked'))
			  {
				$('.resetwlp').attr("checked",false);
			  }
			});	

           /*   $('.ourpickscore').keydown(function(e){
             if (e.shiftKey || e.ctrlKey || e.altKey) 
			  {
				e.preventDefault();
			  } 
			  else
				{
				var key = e.keyCode;
				if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
				{
				 alert('Invalid Pick Score');
				 $('.ourpickscore').val('');
				}
				}
              }); */

           /*  $('.oppscore').keydown(function(e){
             if (e.shiftKey || e.ctrlKey || e.altKey) 
			  {
				e.preventDefault();
			  } 
			  else
				{
				var key = e.keyCode;
				if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
				{
				alert('Invalid Opponent Score');
				$('.oppscore').val('');
				}
				}
              }); */

			  //code for Profit
			  
              $('#avgprofitbetx').keyup(function(){
			   var avg1 = $(this).val();
				if (isNaN($(this).val()))
				 {
				 alert('Invalid Avg-Profit-Per-Bet Pct.Only Numeric.');
				 $(this).val('');
				 } 
              });
			  
			  $('.avgprofitdate').keydown(function(e){
			 /*  var avg2 = $(this).val();
              if (e.shiftKey || e.ctrlKey || e.altKey) 
			  {
				e.preventDefault();
			  } 
			  else
				{
				var key = e.keyCode;
				if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
				{
				 alert('Invalid Avg Year To Date Pct.Only Numeric.'+avg2.toUpperCase());
				  $(this).val('');
				 }
				} */
              });	
			  
			  $('.gpprofitbet').keydown(function(e){
			  /*  var avg3 = $(this).val();
              if (e.shiftKey || e.ctrlKey || e.altKey) 
			  {
				e.preventDefault();
			  } 
			  else
				{
				var key = e.keyCode;
				if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
				{
				 alert('Invalid Gross Profit Pct.Only Numeric.'+avg3.toUpperCase());
				  $(this).val('');
				 }
				} */
              });	
			  
			  $('.gpprofitdate').keydown(function(e){
			/* 	var avg4 = $(this).val();
              if (e.shiftKey || e.ctrlKey || e.altKey) 
			  {
				e.preventDefault();
			  } 
			  else
				{
				var key = e.keyCode;
				if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) 
				 {
				 alert('Invalid GP Year To Date.Only Numeric.'+avg4.toUpperCase());
				  $(this).val('');
				 }
				} */
              });


			 $('.fgetbetday').blur(function(){
				var betday = $(this).val();
				var base_url = window.location.origin;
                if(betday=='')
				{
					alert('Please Select Bet Day');
					return false;
				 }
                 else
				 {
				 var bid = betday; 
                    $.ajax({
					type:'POST',
                    url:base_url+'/financial/fetchbetData',
					dataType:'json',
                    cache: false,					
					data:{'id':bid},
					success:function(response){
                         if(response['success']){
						  var fbet_date = response['success']['fbet_date'];
						  var fday = response['success']['fday'];
						  $('#fbetdate').val(fbet_date);
						  $('#fday').val(fday);
						  
						  }
						 else{
							alert(response['nobetday']); }
					   }
				  }); 
				 }
			 }); 
			 
			 
			 $('.invgetbetday').blur(function(){
				var betday = $(this).val();
				var base_url = window.location.origin;
                if(betday=='')
				{
					alert('Please Select Bet Day');
					return false;
				 }
                 else
				 {
				 var bid = betday; 
                    $.ajax({
					type:'POST',
                    url:base_url+'/investor/fetchbetData',
					dataType:'json',
                    cache: false,					
					data:{'id':bid},
					success:function(response){
                         if(response['success']){
						  var fbet_date = response['success']['fbet_date'];
						  var fday = response['success']['fday'];
						  $('#fbetdate').val(fbet_date);
						  $('#fday').val(fday);
						  
						  }
						 else{
							alert(response['nobetday']); 
							$('#fbetdate').val('');
							$('.invgetbetday').val('');
							
							}
					   }
				  }); 
				 }
			 });
           
             $('.redirectgame').click(function(){
				
				var base_url = window.location.origin;
               window.location.href = 'http://underdogkings.com/gamers/';				
			 });
			 
			 
			 
			 $('.redirectinvestment').click(function(){
                window.location.href = 'http://underdogkings.com/investment/';
			 });
			 $('.redirectfinancial').click(function(){
                window.location.href = 'http://underdogkings.com/financial/';
			 });
			 $('.redirectgameedit').click(function(){
                window.location.href = 'http://underdogkings.com/gamers/';
			 });

			 
			 
			 

//end of document ready	 
});
$(document).on('click','.nextbetdata',function(){
				var get_id		=	$(this).attr('attr');
				var id = $('.betid').val();
				var c_t	=	$('#c_t').val();
			    var base_url = window.location.origin;
				$.ajax({
					  type:'POST',
					  url:base_url+'/gamedetails/nextbetData/',
					  dataType:'json',
                      cache: false, 
					  data:{'id':get_id,'c_t':c_t},
					  success:function(output)
					  {
						   $('.height-table').html('');   
						 if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
								window.scrollTo(0,0); // first value for left offset, second value for top offset
							}else{
								$('.height-table').scrollTop();
							}
						  if(output.preview_html=='')
						 {
							$('.preview_show').hide();
							$('.prview_hide').show();
						 }else{
							 $('.preview_show').show();
							$('.prview_hide').hide();
							 $('#get_preview_id').attr('attr',output.preview_html);
						 }
						 if(output.nextview_html==''){
							 $('.nextview_show').hide(); 
 							$('.nextview_hide').show();	
							$('#which_day').val('c');
							/* $('.show_openingmessage').show();	 */
						 }else if(output.nextview_html=='today'){
							/*  $('.nextview_show').hide(); 
 							$('.nextview_hide').show();	*/
							$('#which_day').val('c'); 
							$('.show_openingmessage').show();
							$('#get_next_id').hide();
							/* $('.show_openingmessage').show();	 */
						 }else{
							$('.nextview_show').show();
							$('.nextview_hide').hide();	
							$('#get_next_id').attr('attr',output.nextview_html);
							$('#which_day').val('x');
							/* $('.show_openingmessage').hide();	 */
						 }
						 $('.height-table').html(output.html);		                         
      				  }
				});
			
			});	
            
	$(document).on('click','.previewbetdata',function(){
			var select_timezone	= $('#select_timezone').val();
			/* alert(select_timezone);
			return false; */
				var get_id		=	$(this).attr('attr');
				var id = $('.betid').val();
			    var base_url = window.location.origin;
				$.ajax({
					  type:'POST',
					  url:base_url+'/gamedetails/previewbetData/',
					  dataType:'json',
                      cache: false, 
					  data:{'id':get_id,'time_zone':select_timezone},
					  success:function(output)
					  {
						  
						  $('.height-table').html(''); 
							if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
								window.scrollTo(0,0); // first value for left offset, second value for top offset
							}else{
								$('.height-table').scrollTop();
							}
                          	$('.show_openingmessage').hide();					  
						 if(output.preview_html=='')
						 {
							$('.preview_show').hide();
							$('.prview_hide').show();
						 }else{
							 $('.preview_show').show();
							$('.prview_hide').hide();
							 $('#get_preview_id').attr('attr',output.preview_html);
						 }
						 if(output.nextview_html==''){
							 $('.nextview_show').hide();
							$('.nextview_hide').show();	
							$('#which_day').val('c');
						 }else{
							$('.nextview_show').show();
							$('.nextview_hide').hide();	
							$('#get_next_id').show();	
							$('#get_next_id').attr('attr',output.nextview_html);
							$('#which_day').val('x');
						 }
                        	var maxh = $(".height-table").height();				
						 $('.height-table').html(output.html);     
/*  $('.scrollbar-inner').scrollbar();					 
 */      				  }
					
				});
			
			});
$(document).on('click','.moregrossprofit',function(){
				var htmls	=	 $('#grossprofit').html();
				var newhtml	=	 $('.height-table').html();
				$('#heightshow').html(newhtml);
			 $('.height-table').html(htmls);
			 
			 });
			 
			 $(document).on('click','.closegrossprofit',function(){
				 
				var htmls	=	 $('#heightshow').html();	
				$('.height-table').html(htmls); 
			 });
			 $(document).on('click','.moreaverageprofit',function(){
					var htmls	=	 $('#averageprofit').html();
				var newhtml	=	 $('.height-table').html();
				$('#heightshow').html(newhtml);
			 $('.height-table').html(htmls);
			}); 
			 $(document).on('click','.closegrossprofit',function(){
				var htmls	=	 $('#heightshow').html();	
				$('.height-table').html(htmls); 		 
			 });
			 $(document).on('click','.getnextyear',function(){
				 var id = $('.getnextyear').data('id');
				 var url = 'http://underdogkings.com/gamers/getNextYear';
                   $.ajax({
					type:'POST',
                    url:url,
					dataType:'json',
                    cache: false,					
					data:{'id':id},
					success:function(response){
                         $('#get_bet_data').html(response.html); 
					   }
				  }); 				   
			 });
function resizeDiv() {
vpw = $(window).width();
footerh =	$('.footer').height()
vph = ($(window).height())-footerh-100; 
/* alert($('.footer').height())
  $('.height-table').css('max-height', ''+vph+'px');*/
} 
function check_form(){
alert("Please select the game first")
return false;
}
function new_game(){
	usertype	= $('#usertype').val();
	if(usertype=='gamers'){
		new_right	= $('#new_right');
		update_right	= $('#update_right');
		if(new_right.is(":checked") || update_right.is(":checked")){
			return true;
		}else{
			alert("Please select an access type");
			return false;
		}
	}
	
}
function send_login(){
	 var base_url = window.location.origin;
			  window.location.href = 'http://underdogkings.com/gamedetails/';
}
function submit_form(form_id){
	
	$('#'+form_id+'').submit();
}
function validate_game_form(){
	away_teamval	= $('#away_teamval').val();
	away_teamtext	= $('#away_teamtext').val();
	home_teamval	= $('#home_teamval').val();
	home_teamtext	= $('#home_teamtext').val();
	our_pickval		= $('#our_pickval').val();
	our_picktext	= $('#our_picktext').val();
	bet_value		= $('#bet_value').val();
	if(away_teamval==''){
		alert("Please enter Away team value");
		$('#away_teamval').focus();
		return false;
	}if(away_teamtext==''){
		alert("Please select Away team");
		$('#away_teamtext').focus();
		return false;
	}if(home_teamval==''){
		alert("Please enter Home team value");
		$('#home_teamval').focus();
		return false;
	}if(home_teamtext==''){
		alert("Please select Home team");
		$('#home_teamtext').focus();
		return false;
	}if(our_pickval==''){
		alert("Please enter our pick value");
		$('#our_pickval').focus();
		return false;
	}if(our_picktext==''){
		alert("Please select Our Pick team");
		$('#our_picktext').focus();
		return false;
	}if(bet_value==''){
		alert("Please enter bet value");
		$('#bet_value').focus();
		return false;
	}
	
}
/* $(document).ready(function(){
	
$('#select_timezone').on("change keyup",function(){
	var ele	=	$(this).val();
	var base_url = window.location.origin;
	window.location.href	=	base_url+'/gamedetails/index/'+ele;
});
}); */

function change_time(timezone){
	var base_url = window.location.origin;
/* 	alert(base_url+'gamedetails/index/'+ele);return false; */
	window.location.href	=	base_url+'/gamedetails/index/'+timezone;
}