<div class="calculator" ng-app="CalcApp">
  <div class="banner" style="background-image: url('<?= the_post_thumbnail_url('full') ?>')">
    <div class="overlay">
      <h1><?= the_title() ?></h1>
    </div>
  </div>
  <div class="calc-container" ng-controller="SimpleCalcController">
    <div id="modal">
      <div class="modal-box">
        <div class="close" ng-click="closeModal();"><svg viewBox="0 0 20 20"><polyline points="2,2 18,18" /><polyline points="2,18 18,2" /></svg></div>
        <form class="modal-form" style="opacity:0" novalidate>
          <h2>We've generated your results!</h2>
          <p>Based on industry assumptions, we've generated a quick preview of your Gross Margin, Revenue, and Average Order Value.</p>
          <input id="firstName" name="firstName" ng-model="data.firstName" type="text" placeholder="First Name*" required />
          <input id="lastName" name="lastName" ng-model="data.lastName" type="text" placeholder="Last Name*" required />
          <input id="email" name="email" ng-model="data.email" type="email" placeholder="Email Address*" required />
          <input id="phone" name="phone" ng-model="data.phone" type="number" step="0.01" placeholder="Phone" />
          <p class="warning-2">Please fill out all required fields.</p>
          <button class="button continue" ng-click="showResults();">SEE YOUR INDUSTRY ROI <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></button>
        </form>
        <div class="loading"><h2>Calculating</h2></div>
      </div>
    </div>
    <div id="intro" class="slide">
      <form class="left" novalidate>
        <section id="intro-question">
          <svg id="calculator" class="circle-icon" viewBox="0 0 156.3 156.3">
            <defs><style>.calc-1{fill:#8cc6ec;}.calc-2{fill:#026cb6;}.calc-3{fill:#e2704d;}</style></defs>
            <path class="calc-1" d="M78.15,155.8A77.65,77.65,0,1,1,155.8,78.15,77.74,77.74,0,0,1,78.15,155.8Zm0-152.52A74.87,74.87,0,1,0,153,78.15,75,75,0,0,0,78.15,3.28Z"/>
            <path class="calc-1" d="M78.15,0A78.15,78.15,0,1,0,156.3,78.15,78.24,78.24,0,0,0,78.15,0Zm0,152.52a74.37,74.37,0,1,1,74.37-74.37A74.46,74.46,0,0,1,78.15,152.52Z"/>
            <path class="calc-2" d="M107.89,35.13H48.41a4.22,4.22,0,0,0-4.21,4.21v78.27a4.22,4.22,0,0,0,4.21,4.21h59.48a4.22,4.22,0,0,0,4.21-4.21V39.34A4.22,4.22,0,0,0,107.89,35.13Zm1.32,82.48a1.32,1.32,0,0,1-1.32,1.32H48.41a1.32,1.32,0,0,1-1.32-1.32V39.34A1.32,1.32,0,0,1,48.41,38h59.48a1.32,1.32,0,0,1,1.32,1.32Z"/>
            <path class="calc-2" d="M51.42,114.59H67.31V98.7H51.42Zm2.89-13H64.43V111.7H54.31Z"/>
            <path class="calc-2" d="M70.2,114.59H86.1V98.7H70.2Zm2.89-13H83.21V111.7H73.09Z"/>
            <path class="calc-2" d="M89,114.59h15.89V79.92H89Zm2.89-31.79H102v28.9H91.88Z"/>
            <path class="calc-2" d="M51.42,95.81H67.31V79.92H51.42Zm2.89-13H64.43V92.92H54.31Z"/>
            <path class="calc-2" d="M70.2,95.81H86.1V79.92H70.2Zm2.89-13H83.21V92.92H73.09Z"/>
            <path class="calc-2" d="M51.42,77H67.31V61.14H51.42Zm2.89-13H64.43V74.14H54.31Z"/>
            <path class="calc-2" d="M70.2,77H86.1V61.14H70.2Zm2.89-13H83.21V74.14H73.09Z"/>
            <path class="calc-2" d="M89,77h15.89V61.14H89Zm2.89-13H102V74.14H91.88Z"/>
            <path class="calc-3" d="M51.42,56.8h53.46V42.35H51.42Zm2.89-11.56H102v8.67H54.31Z"/>
          </svg>
          <svg id="pie" class="circle-icon" viewBox="0 0 156.3 156.3">
            <defs><style>.pie-1{fill:#8cc6ec;}.pie-2{fill:#e2704d;}.pie-3{fill:#026cb6;}</style></defs>
            <path class="pie-1" d="M78.15,155.8A77.65,77.65,0,1,1,155.8,78.15,77.74,77.74,0,0,1,78.15,155.8Zm0-152.52A74.87,74.87,0,1,0,153,78.15,75,75,0,0,0,78.15,3.28Z"/>
            <path class="pie-1" d="M78.15,0A78.15,78.15,0,1,0,156.3,78.15,78.24,78.24,0,0,0,78.15,0Zm0,152.52a74.37,74.37,0,1,1,74.37-74.37A74.46,74.46,0,0,1,78.15,152.52Z"/>
            <path class="pie-2" d="M85.71,31.95a1.86,1.86,0,0,0-1.87,1.87v37a1.86,1.86,0,0,0,1.87,1.87h37a1.86,1.86,0,0,0,1.87-1.87A38.9,38.9,0,0,0,85.71,31.95Zm1.87,37V35.75A35.19,35.19,0,0,1,120.84,69Z"/>
            <path class="pie-3" d="M115.49,82.44a1.86,1.86,0,0,0-1.87-1.87H75.47V42.39a1.86,1.86,0,0,0-1.87-1.87,41.91,41.91,0,1,0,41.89,41.91ZM73.6,120.61A38.18,38.18,0,0,1,71.73,44.3V82.42a1.86,1.86,0,0,0,1.87,1.87h38.12A38.23,38.23,0,0,1,73.6,120.61Z"/>
          </svg>
          <svg id="money" class="circle-icon" viewBox="0 0 156.3 156.3">
            <defs><style>.money-1{fill:#8cc6ec;}.money-2{fill:#fff;}.money-3{fill:#026cb6;}.money-4{fill:#e2704d;}</style></defs>
            <path class="money-1" d="M78.15,155.8A77.65,77.65,0,1,1,155.8,78.15,77.74,77.74,0,0,1,78.15,155.8Zm0-152.52A74.87,74.87,0,1,0,153,78.15,75,75,0,0,0,78.15,3.28Z"/>
            <path class="money-1" d="M78.15,0A78.15,78.15,0,1,0,156.3,78.15,78.24,78.24,0,0,0,78.15,0Zm0,152.52a74.37,74.37,0,1,1,74.37-74.37A74.46,74.46,0,0,1,78.15,152.52Z"/>
            <path class="money-2" d="M79.91,88.73a8.34,8.34,0,0,0-1.36-1,22.59,22.59,0,0,0-2.29-1.18,11.18,11.18,0,0,1-3.78-2.38A5.63,5.63,0,0,1,71,80.33a5.72,5.72,0,0,1,.34-2,5.62,5.62,0,0,1,1-1.67,6.39,6.39,0,0,1,1.59-1.3,8.67,8.67,0,0,1,2.15-.86V71.6h2.6v2.91a6.1,6.1,0,0,1,2.87,1.16,8.89,8.89,0,0,1,2.12,2.69L80.79,80a3.86,3.86,0,0,0-3.41-2.38,3.12,3.12,0,0,0-2.17.77,2.49,2.49,0,0,0-.86,1.93,2.38,2.38,0,0,0,.7,1.75,10.16,10.16,0,0,0,2.76,1.62,27.94,27.94,0,0,1,3,1.54,7.92,7.92,0,0,1,1.76,1.39A6.21,6.21,0,0,1,84.23,91a7,7,0,0,1-1.52,4.45,7.31,7.31,0,0,1-4,2.58v3.07H76.1v-3a7.92,7.92,0,0,1-4.44-2,9.57,9.57,0,0,1-2.25-4.72l3.26-.68a7.66,7.66,0,0,0,1.63,3.22,4.21,4.21,0,0,0,5.42-.13,3.57,3.57,0,0,0,1.08-2.69A3.16,3.16,0,0,0,79.91,88.73Z"/>
            <path class="money-3" d="M125.66,63.41h-95v47h95Zm-3.25,43.7H33.89V66.67h88.51Z"/>
            <rect class="money-3" x="35.01" y="54.68" width="86.28" height="3.25"/>
            <rect class="money-3" x="39.38" y="45.94" width="77.54" height="3.25"/>
            <path class="money-4" d="M77,94.83a3.82,3.82,0,0,1-2.69-.92,7.66,7.66,0,0,1-1.63-3.22l-3.26.68a9.57,9.57,0,0,0,2.25,4.72,7.92,7.92,0,0,0,4.44,2v3h2.6V98a7.31,7.31,0,0,0,4-2.58A7,7,0,0,0,84.23,91a6.21,6.21,0,0,0-1.68-4.38,7.92,7.92,0,0,0-1.76-1.39,27.94,27.94,0,0,0-3-1.54A10.16,10.16,0,0,1,75.05,82a2.38,2.38,0,0,1-.7-1.75,2.49,2.49,0,0,1,.86-1.93,3.12,3.12,0,0,1,2.17-.77A3.86,3.86,0,0,1,80.79,80l2.89-1.62a8.89,8.89,0,0,0-2.12-2.69,6.1,6.1,0,0,0-2.87-1.16V71.6H76.1v2.91a8.67,8.67,0,0,0-2.15.86,6.39,6.39,0,0,0-1.59,1.3,5.62,5.62,0,0,0-1,1.67,5.72,5.72,0,0,0-.34,2,5.63,5.63,0,0,0,1.44,3.88,11.18,11.18,0,0,0,3.78,2.38,22.59,22.59,0,0,1,2.29,1.18,8.34,8.34,0,0,1,1.36,1,3.16,3.16,0,0,1,.9,2.36,3.57,3.57,0,0,1-1.08,2.69A3.79,3.79,0,0,1,77,94.83Z"/>
          </svg>
          <svg id="graph" class="circle-icon" viewBox="0 0 156.3 156.3">
            <defs><style>.graph-1{fill:#8cc6ec;}.graph-2{fill:#026cb6;}.graph-3{fill:#e2704d;}</style></defs>
            <path class="graph-1" d="M78.15,155.8A77.65,77.65,0,1,1,155.8,78.15,77.74,77.74,0,0,1,78.15,155.8Zm0-152.52A74.87,74.87,0,1,0,153,78.15,75,75,0,0,0,78.15,3.28Z"/>
            <path class="graph-1" d="M78.15,0A78.15,78.15,0,1,0,156.3,78.15,78.24,78.24,0,0,0,78.15,0Zm0,152.52a74.37,74.37,0,1,1,74.37-74.37A74.46,74.46,0,0,1,78.15,152.52Z"/>
            <path class="graph-2" d="M99.14,111.62H80.52V38.49H99.14Zm-15.57-3H96.1v-67H83.57Z"/>
            <path class="graph-2" d="M75.78,111.62H57.16V86.78H75.78Zm-15.57-3H72.74V89.82H60.2Z"/>
            <path class="graph-2" d="M52.42,111.62H33.8V72.76H52.42Zm-15.57-3H49.37V75.8H36.84Z"/>
            <path class="graph-2" d="M122.5,111.62H103.88V51H122.5Zm-15.58-3h12.53V54H106.93Z"/>
            <rect class="graph-3" x="33.8" y="114.76" width="88.7" height="3.04"/>
          </svg>
          <h2>You know that upgrading your enterprise commerce platform will produce benefits. But what’s the real impact? </h2>
          <p><b>This is more than an ROI calculator.</b> It’s your organization’s guide to a complete digital commerce transformation.</p>
        </section>

        <section id="industry-question">
          <h2>Let's start with the basics. What's your <b>industry</b>?</h2>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="consumer" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="consumer" />
              <label for="consumer">
                <?=svg('#consumer-package-goods',1,0,'Consumer Package Goods');?>

                <p>Consumer Products</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="distribution" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="distribution" />
              <label for="distribution">
                <?=svg('#distribution',1,0,'Distribution');?>
                <p>Distribution</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="healthcare" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="healthcare" />
              <label for="healthcare">
                <?=svg('#life-sciences',1,0,'Healthcare/Life Sciences');?>

                <p>Healthcare/Life Sciences</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="manufacturing" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="manufacturing" />
              <label for="manufacturing">
                <?=svg('#manufacturing',1,0,'Manufacturing');?>
                <p>Manufacturing</p>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <input id="software" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="software" />
              <label for="software">
               <?=svg('#software-media',1,0,'Software/Media');?>
               <p>Software/Media</p>
             </label>
           </div>

           <div class="col-xs-12 col-sm-6 col-md-4">
            <input id="other" class="tile-radio" name="industry" type="radio" ng-model="data.industry" value="Other" />

            <label for="other">
             <?=svg('#other',1,0,'Other');?>
             <p>Other</p>
           </label>
         </div>
       </div>
     </section>

     <section id="commerce-question">
      <h2>What's your <b>current commerce solution</b>?</h2>
      <div class="select">
        <select id="commerce" name="commerce" ng-model="data.commerce" required>
          <option value="" disabled selected>- Select -</option>
          <option value="none">None</option>
          <option value="legacy">Legacy</option>
          <option value="custom">Custom</option>
        </select>
        <svg wiewBox="0 0 24 24"><polyline points="4,8 12,16 20,8" /></svg>
      </div>
    </section>

    <section id="total-question" class="single-input">
      <h2>OK, here's a real softball. What's your company's <b>total revenue</b>?</h2>
      <div class="money"><div><span>$</span></div><input id="totalRev" name="totalRev" ng-model="data.totalRevC" class="commas" type="text" min="0" step="1000" required /></div>
    </section>

    <section id="distribution-question">
      <h2>What's your <b>revenue distribution</b> by channel?</h2>
      <div class="row">
        <div class="col-xs-6">
          <label for="digitalRevPercent">Digital</label>
          <div class="label-line"></div>
          <div class="percent"><input id="digitalRevPercent" name="digitalRevPercent" ng-model="data.digitalRevPercent" class="revs" type="number" step="0.01" min="0" max="100" required /><div><span>%</span></div></div>
          <div class="calc"><span>{{data.digitalRev | currency:'$':0}}</span></div>
        </div>
        <div class="col-xs-6 traditional">
          <label for="traditionalRevPercent">Traditional</label>
          <div class="label-line"></div>
          <div class="percent"><input id="traditionalRevPercent" name="traditionalRevPercent" ng-model="data.traditionalRevPercent" class="revs" type="number" step="0.01" min="0" max="100" required /><div><span>%</span></div></div>
          <div class="calc"><span>{{data.traditionalRev | currency:'$':0}}</span></div>
        </div>
      </div>
      <div class="calc-line"><span>Revenue</span></div>
    </section>

    <section id="aov-question">
      <h2>What's the <b>average order value</b> by sales channel?</h2>
      <div class="row">
        <div class="col-xs-6">
          <label for="digitalAOV">Digital</label>
          <div class="label-line-alt"></div>
          <div class="money"><div><span>$</span></div><input id="digitalAOV" class="commas" name="digitalAOV" ng-model="data.digitalAOVC" type="text" min="0" required /></div>
          <div class="calc"><span>{{data.digitalOrders | number: 0}}</span></div>
        </div>
        <div class="col-xs-6 traditional">
          <label for="traditionalAOV">Traditional</label>
          <div class="label-line-alt"></div>
          <div class="money"><div><span>$</span></div><input id="traditionalAOV" class="commas" name="traditionalAOV" ng-model="data.traditionalAOVC" type="text" min="0" required /></div>
          <div class="calc"><span>{{data.traditionalOrders | number: 0}}</span></div>
        </div>
      </div>
      <div class="calc-line"><span>Number of Orders</span></div>
    </section>

    <p class="warning">We can't calculate your ROI with missing data. Please fill out all fields.</p>
    <button class="button continue" ng-click="showModal();">SEE YOUR INDUSTRY ROI <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></button>
  </form>
  <div class="right">
    <div class="tooltip">
      <section>
        <h4>How to Use This Tool</h4>
        <p>We hope you find this tool useful as you share it with your colleagues and evaluate your digital commerce options. As you work through the calculator, you can find helpful tips over here in the sidebar.</p>
      </section>
      <section target="#industry-question">
        <h4>Industry Assumptions</h4>
        <p>You'll notice that some fields in this calculator will already contain figures. These are assumptions based on your industry.</p>
      </section>
      <section target="#commerce-question">
        <h4>Legacy</h4>
        <p>Select Legacy if using SAP Hybris, IBM Websphere eCommerce, Oracle ATG, or a similar eCommerce vendor.</p>
        <h4>Custom</h4>
        <p>Select Custom if using an eCommerce solution that you developed in-house.</p>
      </section>
      <section target="#distribution-question">
        <h4>Digital and Traditional Channels</h4>
        <p>Enter the revenue distribution and average order value for your current digital channel and your traditional channels (direct sales, inside sales and partners).</p>
      </section>
    </div>
  </div>
</div>
<div id="results-page" class="slide">
  <a ng-href="{{data.url}}" target="_blank" class="button download disabled">DOWNLOAD INDUSTRY ROI REPORT</a>
  <section class="roi">
    <p>{{data.roi | number: 0}}%</p>
    <h2>First Year Return on Investment</h2>
    <p class="chart-text" style="margin-left: inherit;">Your ROI was calculated using average implementation costs and subsequent gross margin improvements over the first year.</p>
  </section>
  <section>
    <h2>Revenue</h2>
    <div class="row revenue result-numbers">
      <div class="col-sm-4 col-xs-12">
        <p>{{data.totalRevX | currency:'$':0}}</p>
        <p>Revenue <b>Before</b> Digital Transformation</p>
      </div>
      <div class="col-sm-4 col-xs-12">
        <p>{{data.totalRev2 | currency:'$':0}}</p>
        <p>Revenue <b>After</b> Digital Transformation</p>
      </div>
      <div class="col-sm-4 col-xs-12">
        <p><b>+{{data.totalRevIncrease | currency:'$':0}}</b></p>
        <p>Revenue Increase</p>
      </div>
    </div>
  </section>
  <section>
    <h2>Gross Margin</h2>
    <div class="row margin result-numbers">
      <div class="col-sm-4 col-xs-12">
        <p>{{data.totalMargin | currency:'$':0}}</p>
        <p>Gross Margin <b>Before</b> Digital Transformation</p>
      </div>
      <div class="col-sm-4 col-xs-12">
        <p>{{data.totalMargin2 | currency:'$':0}}</p>
        <p>Gross Margin <b>After</b> Digital Transformation</p>
      </div>
      <div class="col-sm-4 col-xs-12">
        <p><b>+{{data.totalMarginIncrease | currency:'$':0}}</b></p>
        <p>Gross Margin Increase</p>
        <div class="margin-legend">
          <div class="before1"></div><div class="before2"></div><div>Before</div>
          <div class="after1"></div><div class="after2"></div><div>After</div>
        </div>
      </div>
    </div>
    <div id="quickChart" class="chart"></div>
    <div id="quickChart2" class="chart pdf"></div>
    <p class="chart-text">Before transformation, your organization did {{data.digitalRevPercent | number: 1}}% of sales in the Digital channel. After transformation, it will do {{data.digitalRevPercent2 * 100 | number: 1}}% of sales in the Digital Channel.</p>
    <div class="calculations">
      <div>
        <b>Before Total&nbsp;&nbsp;[{{data.totalMargin / (999999 + 1) | currency:'$':0}}M]</b>
      </div>
      <div>=</div>
      <div>
        Digital [{{data.digitalMargin / (999999 + 1) | currency:'$':0}}M]
      </div>
      <div>+</div>
      <div>
        Traditional [{{(data.directMargin + data.insideMargin + data.partnerMargin) / (999999 + 1) | currency:'$':0}}M]
      </div>
    </div>
    <div class="calculations">
      <div>
        <b>After Total&nbsp;&nbsp;[{{data.totalMargin2 / (999999 + 1) | currency:'$':0}}M]</b>
      </div>
      <div>=</div>
      <div>
        Digital [{{data.digitalMargin2 / (999999 + 1) | currency:'$':0}}M]
      </div>
      <div>+</div>
      <div>
        Traditional [{{(data.directMargin2 + data.insideMargin2 + data.partnerMargin2) / (999999 + 1) | currency:'$':0}}M]
      </div>
    </div>
  </section>
  <section>
    <h2>Want a more detailed assessment of your business? With a little more information, we can provide you with a detailed report that includes:</h2>
    <ul>
      <li>Gross Margin Increases by Channel</li>
      <li>Cost Savings</li>
      <li>Total Revenue Impact by Channel</li>
      <li>3-Year Projected Business Impact</li>
    </ul>
    <br />
    <a href="<?= home_url('/resources/roi-calculator-refined#slide-2'); ?>" class="button continue customize">CUSTOMIZE MY ROI <svg width="10" height="10" viewBox="0 0 20 20"><polyline points="5,0 15,10 5,20" /></svg></a>
    <small>These results have been calculated with a set of assumptions that are intended to establish a baseline for further conversation and assessment. They are only a guide based on our experience. We invite you to engage further with us to develop a 360-degree, accurate evaluation of your business and the positive impact that CloudCraze may have.</small>
  </section>
</div>
</div>
</div>
