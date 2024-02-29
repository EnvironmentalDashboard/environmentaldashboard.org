<!doctype html>
<html lang="en">
  <head>
    <?php include 'includes/html-head.php'; ?>
    <meta name="description" content="The numbers displayed in gauges on Citywide Dashboard provide current rates of water, electricity consumption, water quality, and weather conditions in Oberlin. Sliders below the current values compare current use to previous readings.">
    <link rel="stylesheet" type="text/css" href="css/gauges-explained.css">
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-12" style="padding: 40px">
          <h4>What do Numbers in the Gauges Mean?</h4>
          <p>The numbers displayed in gauges on the right hand side of the Citywide Dashboard provide information about current rates of water and electricity consumption in Oberlin and about water quality and weather. The meaning and importance of each gauges is explained below. Underneath each explanation you can click the link to see graphs of the most recent patterns of change over time for that measurement. The little circle and line at the bottom of each gauge lets you know how the current value displayed compares to average, high, and low. Click on the tabs below for more information about our gauges arranged by Electricity, Water, Watershed and Weather.</p>
          <nav>
            <div class="nav nav-pills justify-content-md-center" id="nav-pill" role="tablist">
              <a class="nav-item nav-link active" id="electricity-tab" data-toggle="tab" href="#electricity" role="tab" aria-controls="electricity" aria-selected="true">Electricity</a>
              <a class="nav-item nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">Water</a>
              <a class="nav-item nav-link" id="watershed-tab" data-toggle="tab" href="#watershed" role="tab" aria-controls="watershed" aria-selected="false">Watershed</a>
              <a class="nav-item nav-link" id="weather-tab" data-toggle="tab" href="#weather" role="tab" aria-controls="weather" aria-selected="false">Weather</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-pillContent">
            <div class="tab-pane fade show active" id="electricity" role="tabpanel" aria-labelledby="electricity-tab">
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290" scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=16&meter_id=786&color=%23ecf0f1&bg=%23f39c12&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=City+Electricity+Use&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>
                    The total amount of electricity being consumed right now by all customers of Oberlin Municipal Light and Power (OMLPS) expressed per resident of Oberlin. This includes electricity used in homes, businesses, the college and for city government (street lamps, city hall, police station, water treatment, etc). There are approximately 8,300 residents of Oberlin, including Oberlin College Students. A “Watt” is the unit used to measure the flow of electricity. For example, a 100 Watt light bulb consumes electricity at a rate of 100 Watts when it is turned on. Electricity flows are measured with sensors installed at OMLPS.
                  </p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290" scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=30&meter_id=788&color=%23ecf0f1&bg=%233498db&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Water+Treatment+Electricity&title2=Use&border_radius=3&rounding=1&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The electricity used to treat all of the water in Oberlin that comes out of the tap and goes down the drain expressed per resident of Oberlin. This includes all the electricity that is used to clean and pump water that is drawn from the Black River, stored, treated and then delivered through pipes to homes and businesses. It also includes electricity used to clean the waste water that goes down the drain, into the sewer system, and is then processed by the waste water treatment system before it enters Plum Creek. For City Government, water treatment is the second highest consumer of electricity (city-owned buildings are the highest).</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=17&meter_id=789&color=%23ecf0f1&bg=%23e74c3c&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=CO2+Emissions+From+Electricity&title2=Per+Person&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The amount of carbon dioxide gas (CO<sub>2</sub>) released into the atmosphere per Oberlin resident as a result of the current rate of electricity use. CO<sub>2</sub> is the most important gas that causes climate change. This gas is released when fossil fuels such as coal, natural gas or fuel oil are burned to generate electricity. Although we can’t directly weigh a gas, the weight of gas can be calculated from the amount of different fossil fuels burned. Emissions for electricity will go down as the city continues to increase its reliance on renewable and green sources to produce the electricity its citizens use.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=2989&meter_id=2950&color=%23ecf0f1&bg=%232ecc71&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Outdoor+Temperature&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Current outside air temperature in °F. Cooling and sometimes heating consume electricity. Electricity use in Oberlin is at its highest value for the year in the afternoon on hot and humid days in the summer when air conditioner use is most intense. Since most homes in Oberlin use natural gas rather than electricity for heating, cold winter days don’t have as large an impact on city-wide electricity use. With that said, if the community shifts to heating homes with electricity using heat pumps (including geothermal), electricity consumption on cold days in the winter will look more like it does on hot summer days.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
            <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=28&meter_id=347&color=%23ecf0f1&bg=%2334495e&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Total+Drinking+Water+Per&title2=Person&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The total amount of piped fresh water that is consumed in the City of Oberlin per resident. This includes water used in homes, businesses, the college and for city government for drinking, flushing toilets, cleaning things, watering plants, fighting fires, etc. Our drinking water is pumped from the West branch of the Black River into the Parsons road reservoir, is treated at the fresh water plant and is pumped into two large storage towers in the city that maintain pressure. The numbers displayed on this gauge come from sensors installed in Oberlin’s fresh water treatment plant. Water use is usually highest in the summer when it is used for watering plants and staying cool. Oberlin is in a water rich region, but it is still important to conserve water and vital to protect the source of our freshwater from pollution.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=29&meter_id=314&color=%23ecf0f1&bg=%232ecc71&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Wastewater+Treated&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The total amount of waste water currently being treated in Oberlin’s wastewater treatment facility. This includes all the water that does down toilets, sinks and other drains in homes, businesses, the college and city buildings. The facility, which largely relies on biological processes to clean water, can treat a maximum of 28 gallons per hour per resident. After rain or snow the flow of waste water is often higher than this because rainwater “infiltrates” the city’s sewer pipes. The city pumps excess wastewater into a big storage pond and then treats it when flow goes back to normal levels. We need to be careful and only put biodegradable materials down the drain because all of our treated wastewater is released into Plum Creek and eventually becomes someone’s drinking water again.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=17&meter_id=789&color=%23ecf0f1&bg=%23e74c3c&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=CO2+Emissions+From+Electricity&title2=Per+Person&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The amount of carbon dioxide gas (CO<sub>2</sub>) released into the atmosphere per Oberlin resident as a result of electricity used to clean both drinking water and wastewater. CO<sub>2</sub> is the most important gas that causes climate change. For the Oberlin City government, water treatment is the second greatest source of CO<sub>2</sub> emissions (municipal buildings are the highest).</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=26&meter_id=351&color=%23ecf0f1&bg=%232980b9&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Reservoir+Water+Level&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Oberlin’s drinking water is stored in a reservoir located on Parsons Road that, when 100% full, stores 450 million gallons of water. Water is periodically pumped from the West branch of the Black River to refill the reservoir. The reservoir is open to fishing, but not for swimming. Algae in the reservoir are periodically controlled with chemical treatments to maintain water quality. Water from the reservoir is cleaned using a variety of chemical processes to remove particles and ions and to disinfect it before it is pumped to the two large water tanks that provide a continuous source of high quality drinking water for city residents.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="watershed" role="tabpanel" aria-labelledby="watershed-tab">
            <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=15&meter_id=324&color=%23ecf0f1&bg=%239b59b6&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Plum+Creek+Depth&title2=&border_radius=3&rounding=0&ver=svg&units=Inches" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The current depth of water in Plum Creek in the stretch of the river next to the waste water treatment plant. Deeper water means higher flow. Plum Creek’s “watershed” is the 12.4 square mile area of land that drains into it. Sixty percent of the watershed area is currently used for agriculture and the remaining area is covered with forest, recreational areas and city. Within the city, rain that fall on streets, parking lots, roofs and other hard surfaces rapidly finds its way into the creek. This means that water levels rise rapidly after a storm. Extreme weather events associated with climate change will increase the frequency of flooding.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=21&meter_id=315&color=%23ecf0f1&bg=%2334495e&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Plum+Creek+Dissolved&title2=Oxygen&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>The amount of oxygen gas (O2) that is dissolved in the water in Plum Creek relative to how much would be there if nothing in the river were using it. Like us, the animals, plants and microorganisms that live in the stream consume oxygen when they breathe (respire). When it is sunny, underwater plants can release O2 as they capture light energy and use it to make food (photosynthesize). The amount of O2 in the water tells us a lot about current living conditions; when respiration is greater than photosynthesis O2 falls below 100%. When photosynthesis is greater than respiration O2 can go above 100%. Oxygen is consumed when leaves, dog feces and other organic materials that get washed into the stream decompose. Animals like fish can die of suffocation if this drives the oxygen levels too low.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=22&meter_id=323&color=%23ecf0f1&bg=%232ecc71&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Plum+Creek+Turbidity&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Turbidity, a measure of water clarity, is measured in NTUs (“Nephelometric Turbidity Units”). Water with low turbidity (e.g. 0 NTUs) is clear, while stream water with high turbidity is cloudy (e.g. 150 NTU for Plum Creek). The cloudiness is caused by particles of soil, dead plants and other materials that are mixed in the water. Turbid water blocks sunlight and can fill in the stream with sediment, damaging aquatic life. The highly turbid coffee color of Plum Creek after a heavy rain is caused by soil particles washed off of agricultural fields that drain into the creek. Pollution, construction, and poor agricultural practices all increase turbidity.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=23&meter_id=322&color=%23ecf0f1&bg=%239b59b6&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Plum+Creek+Temperature&title2=&border_radius=3&rounding=0&ver=svg&units=Deg+F" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Temperature exerts a major influence on biological activity and growth. Temperature governs the kinds of organisms that can live in rivers and lakes. Fish, insects, zooplankton, phytoplankton, and other aquatic species all have a preferred temperature range. As temperatures get too far above or below this preferred range, the number of individuals of the species decreases until finally there are none. Temperature is also important because of its influence on water chemistry. Warm water holds less dissolved oxygen than cool water, and may not contain enough dissolved oxygen for the survival of different species of aquatic life. higher water temperatures can also dissolve more minerals from the surrounding rock and will therefore have a higher electrical conductivity.</p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="weather" role="tabpanel" aria-labelledby="weather-tab">
            <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=2989&meter_id=2950&color=%23ecf0f1&bg=%232ecc71&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Air+Temperature&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Current outside air temperature in °F. The temperate climate zone in which Oberlin is located experiences wide variation in seasonal temperature. However, this variability is somewhat damped in Oberlin because of its location downwind from Lake Erie; the presence of a large body of water causes air to heat up and cool down more slowly. Average monthly temperature in Oberlin ranges from 24°F in January to 72°F in July. The changes in climate that humans have caused by burning fossil fuel have resulted in both warmer temperatures and more temperature extremes, including more summer days above 90°F.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=19&meter_id=2125&color=%23ecf0f1&bg=%2334495e&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Precipitation&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Unless it is currently raining, this gauge will read zero since it measures precipitation over the course of an hour in units of 100ths of inches of rain. Averages precipitation in Oberlin ranges from 2 inches/month in February to 4 inches/month in June. Winds blow over Lake Erie and collect moisture, which is why it is so cloudy in Oberlin, particularly in winter months. The changes in climate that humans are causing by burning fossil fuels are expected to results in wetter springs and dryer summers -- factors that will make agriculture more difficult in this region. </p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=24&meter_id=2148&color=%23ecf0f1&bg=%232ecc71&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Relative+Humidity&title2=&border_radius=3&rounding=0&ver=svg&units=Percent" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Humidity is a measure of how much water vapor (water in the form of gas) is currently stored in the air. “Relative humidity,” which is expressed as a percentage, indicates how much water vapor is in the air relative to the maximum amount of water vapor that could be in the air at this temperature. Hot air holds more water vapor than cold air. Our bodies cool themselves by allowing sweat to evaporate from our skin. When humidity is high it is harder for sweat to evaporate &mdash; this is why hot and humid (“muggy”) days feels so much more unpleasant than an equally hot but dry day.</p>
                </div>
              </div>
              <div class="gaugerow">
                <div class="gauge">
                  <iframe height="190" width="290"  scrolling="no" src="https://environmentaldashboard.org/gauges/gauge.php?rv_id=20&meter_id=2571&color=%23ecf0f1&bg=%23f39c12&height=190&width=290&font_family=Futura%2C+Helvetica%2C+sans-serif&title=Wind+Speed&title2=&border_radius=3&rounding=0&ver=svg&units=" frameborder="0"></iframe>
                </div>
                <div class="col-12 col-sm-8">
                  <p>Monthly average wind speeds in Oberlin are approximately 12 mph for December through April and drop to a low of 8 mph in August. Prevailing winds in Ohio range from the North to the West to South West depending on season and on weather fronts. Wind speeds are higher on the edge of Lake Erie and in certain regions that channel the wind. Oberlin receives part of its renewable electricity from wind turbines located in Bowling Green Ohio.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
  </body>
</html>