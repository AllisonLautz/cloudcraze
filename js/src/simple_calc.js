var app = angular.module('CalcApp', []);

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

app.controller('SimpleCalcController', ['$scope', '$filter', function SimpleCalcController($scope, $filter) {
  $scope.data = [];
  var d = $scope.data;
  // d.firstName = 'Blake';
  // d.lastName = 'Boucher';
  // d.email = 'blakeboucher@walkersands.com';
  // d.phone = '';
  // d.industry = 'other';
  // d.commerce = 'legacy';
  // d.totalRev = 400000000;
  // d.digitalRevPercent = 10;
  // d.traditionalRevPercent = 90;
  // d.digitalAOV = 1000;
  // d.traditionalAOV = 2000;
  // d.digitalRev = 0;
  // d.traditionalRev = 0;
  // d.digitalOrders = 0;
  // d.traditionalOrders = 0;

  // Assumptions
  $scope.$watch('[data.industry, data.commerce, data.totalRev]', function(newVal, oldVal) {
    newVal[2] = newVal[2] || d.totalRevP;
    if (newVal[2] < 300000000) {
      d.digitalSystemsCost2 = 450000;
    } else if (newVal[2] > 750000000) {
      d.digitalSystemsCost2 = 900000;
    } else {
      d.digitalSystemsCost2 = 600000;
    }
    if (newVal[1]=='none') {
      d.digitalRevPercent = 0;
      d.traditionalRevPercent = 100;
      d.digitalAOV = 0;
      d.digitalAOVC = 0;
    } else {
      d.digitalRevPercent = '';
      d.traditionalRevPercent = '';
      d.digitalAOV = '';
      d.digitalAOVC = '';
    }
    switch (newVal[0]) {
      case 'consumer':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 0;
      d.directRevPercentP = 50;
      d.insideRevPercentP = 0;
      d.partnerRevPercentP = 50;

      d.directErrorP = 7;
      d.insideErrorP = 7;
      d.partnerErrorP = 7;

      d.directTeamSizeP = 250;
      d.insideTeamSizeP = 200;
      d.directSalaryP = 60000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 7;
      d.businessBumpP = 3;
      d.crossSellP = 3;
      d.newProductP = 9;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.1;
      d.salesEfficiencyGain = 0.3;

      d.digitalShift = 0.5;
      d.directShift = 0.3;
      d.insideShift = 0;
      d.partnerShift = 0.2;
      break;
      case 'distribution':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 30;
      d.directRevPercentP = 60;
      d.insideRevPercentP = 10;
      d.partnerRevPercentP = 0;

      d.directErrorP = 13;
      d.insideErrorP = 13;
      d.partnerErrorP = 13;

      d.directTeamSizeP = 200;
      d.insideTeamSizeP = 75;
      d.directSalaryP = 60000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 10;
      d.businessBumpP = 3;
      d.crossSellP = 3;
      d.newProductP = 9;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.15;
      d.salesEfficiencyGain = 0.5;

      d.digitalShift = 0.9;
      d.directShift = 0.1;
      d.insideShift = 0;
      d.partnerShift = 0;
      break;
      case 'healthcare':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 5;
      d.directRevPercentP = 60;
      d.insideRevPercentP = 10;
      d.partnerRevPercentP = 25;

      d.directErrorP = 7;
      d.insideErrorP = 7;
      d.partnerErrorP = 7;

      d.directTeamSizeP = 400;
      d.insideTeamSizeP = 50;
      d.directSalaryP = 110000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 4;
      d.businessBumpP = 2;
      d.crossSellP = 1;
      d.newProductP = 10;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.4;
      d.salesEfficiencyGain = 0.5;

      d.digitalShift = 0.4;
      d.directShift = 0.3;
      d.insideShift = 0.05;
      d.partnerShift = 0.25;
      break;
      case 'manufacturing':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 10;
      d.directRevPercentP = 60;
      d.insideRevPercentP = 20;
      d.partnerRevPercentP = 10;

      d.directErrorP = 10;
      d.insideErrorP = 10;
      d.partnerErrorP = 10;

      d.directTeamSizeP = 100;
      d.insideTeamSizeP = 50;
      d.directSalaryP = 70000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 5;
      d.businessBumpP = 1;
      d.crossSellP = 2;
      d.newProductP = 1;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.2;
      d.salesEfficiencyGain = 0.5;

      d.digitalShift = 0.55;
      d.directShift = 0.4;
      d.insideShift = 0.05;
      d.partnerShift = 0;
      break;
      case 'software':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 20;
      d.directRevPercentP = 75;
      d.insideRevPercentP = 0;
      d.partnerRevPercentP = 5;

      d.directErrorP = 4;
      d.insideErrorP = 4;
      d.partnerErrorP = 4;

      d.directTeamSizeP = 50;
      d.insideTeamSizeP = 25;
      d.directSalaryP = 90000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 5;
      d.businessBumpP = 3;
      d.crossSellP = 2;
      d.newProductP = 10;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.3;
      d.salesEfficiencyGain = 0.2;

      d.digitalShift = 0.45;
      d.directShift = 0.5;
      d.insideShift = 0;
      d.partnerShift = 0.05;
      break;
      case 'other':
      if (newVal[1]=='none') {
        d.digitalErrorP = 0;
        d.digitalTeamSizeP = 2;
        d.digitalSalaryP = 0;
        d.digitalSystemsCost = 0;
      } else if (newVal[1]=='legacy') {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 5;
        d.digitalSalaryP = 112500;
        d.digitalSystemsCost = 250000;
      } else {
        d.digitalErrorP = 2;
        d.digitalTeamSizeP = 7;
        d.digitalSalaryP = 108000;
        d.digitalSystemsCost = 200000;
      }
      d.digitalRevPercentP = 10;
      d.directRevPercentP = 50;
      d.insideRevPercentP = 20;
      d.partnerRevPercentP = 20;

      d.directErrorP = 8;
      d.insideErrorP = 8;
      d.partnerErrorP = 8;

      d.directTeamSizeP = 50;
      d.insideTeamSizeP = 10;
      d.directSalaryP = 60000;
      d.insideSalaryP = 45000;

      d.digitalIncreaseP = 5;
      d.businessBumpP = 2;
      d.crossSellP = 2;
      d.newProductP = 10;

      d.directSystemsCost = 150000;
      d.insideSystemsCost = 150000;

      d.partnerContribution = 0.2;
      d.salesEfficiencyGain = 0.5;

      d.digitalShift = 0.5;
      d.directShift = 0.3;
      d.insideShift = 0.1;
      d.partnerShift = 0.1;
      break;
    }
  });

$scope.$watch('[data.totalRev, data.digitalRevPercent, data.traditionalRevPercent, data.digitalAOV, data.traditionalAOV]', function(newVals, oldVals) {
  d.digitalRev = (newVals[0]===null || newVals[0]===undefined) || (newVals[1]===null || newVals[1]===undefined) ? 0 : newVals[0] * (newVals[1] / 100);
  d.traditionalRev = (newVals[0]===null || newVals[0]===undefined) || (newVals[2]===null || newVals[2]===undefined) ? 0 : newVals[0] * (newVals[2] / 100);
  if (newVals[1]!=oldVals[1] && newVals[1]) {
    d.traditionalRevPercent = 100 - newVals[1];
  } else if (newVals[2]!=oldVals[2] && newVals[2]) {
    d.digitalRevPercent = 100 - newVals[2];
  }
  d.totalRevPercent = newVals[1] + newVals[2];
  if ((newVals[0]===null || newVals[0]===undefined) || (newVals[1]===null || newVals[1]===undefined || newVals[1]==0) || (newVals[3]===null || newVals[3]===undefined || newVals[3]==0)) {
    d.digitalOrders = 0;
  } else {
    d.digitalOrders = d.digitalRev / newVals[3];
  }
  if ((newVals[0]===null || newVals[0]===undefined) || (newVals[2]===null || newVals[2]===undefined) || (newVals[4]===null || newVals[4]===undefined)) {
    d.traditionalOrders = 0;
  } else {
    d.traditionalOrders = d.traditionalRev / newVals[4];
  }
});

$scope.showModal = function() {
  ga('send', 'event', 'ROI Calculator Progress', 'Clicked See Your Industry ROI', 'Step 1');
  jQuery('form.left').addClass('ng-submitted');
  if (d.industry===undefined || d.industry===null) {
    jQuery('.tile-radio + label').addClass('ng-invalid');
  }
  if (d.industry===undefined || d.industry===null || jQuery('form.left .ng-invalid').length>0) {
    var guilty = jQuery('form.left .ng-invalid').offset().top - 180;
    jQuery('html, body').animate({scrollTop: guilty}, 'slow');
    jQuery('.warning').html('We can\'t calculate your ROI with missing data. Please fill out all fields.').css('opacity', '1');
    return;
  } else {
    jQuery('.warning').css('opacity', '0');
    if (d.totalRevPercent != 100) {
      jQuery('#digitalRevPercent, #traditionalRevPercent').addClass('my-invalid');
      jQuery('.warning').html('Your revenue distribution does not add up to 100%.').css('opacity', '1');
      return;
    } else {
      jQuery('#digitalRevPercent, #traditionalRevPercent').removeClass('my-invalid');
      jQuery('.warning').css('opacity', '0');
    }
  }
  jQuery('html, body').addClass('clicked');
  jQuery('#modal').css({'display':'flex'});
  $scope.showResults.call();
};

$scope.showResults = function() {
  jQuery('form.modal-form').addClass('ng-submitted');
  // if (jQuery('form.modal-form .ng-invalid').length>0) {
  //   jQuery('.warning-2').css('opacity', '1');
  //   return;
  // }
  jQuery('#modal .close').fadeOut();
  jQuery('html, body').removeClass('clicked');
  jQuery('form.modal-form').animate({'opacity': 0}, function() {
    jQuery('.loading').fadeIn(function() {
      setInterval(periods, 800);
      $scope.updateTotals();
      $scope.$apply();
      // jQuery.ajax({
      //   url: ajaxVar.ajax_url,
      //   method: 'post',
      //   data: {
      //     action: 'update_pardot',
      //     firstName: d.firstName,
      //     lastName: d.lastName,
      //     email: d.email,
      //     phone: d.phone,
      //     industry: d.industry,
      //     revenue: d.totalRev,
      //     pic: d.pic
      //   },
      //   success: function(res) {
          ga('send', 'event', 'ROI Calculator Progress', 'Successful Form Completion', 'Step 1');
          d.id = new Date().getUTCMilliseconds();
          if (getCookie('calcComplete')) {
            d.id = getCookie('calcComplete');
          }
          $scope.$apply();
          var now = new Date();
          var oneMonth = now.getTime() + (1000 * 86400 * 30);
          now.setTime(oneMonth);
          document.cookie = 'calcComplete=' + d.id + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcEmail=' + d.email + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcIndustry=' + d.industry + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcCommerce=' + d.commerce + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcTotalRev=' + d.totalRev + '; expires=' + now.toGMTString() + '; path=/;';
          var directRevPercent = Math.floor(d.traditionalRevPercent / 2);
          var insideRevPercent = Math.floor(d.traditionalRevPercent / 4);
          var partnerRevPercent = Math.floor(d.traditionalRevPercent / 4);
          while (d.digitalRevPercent + directRevPercent + insideRevPercent + partnerRevPercent < 100) {
            directRevPercent++;
          }
          document.cookie = 'calcDigitalRevPercent=' + d.digitalRevPercent + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcDirectRevPercent=' + directRevPercent + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcInsideRevPercent=' + insideRevPercent + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcPartnerRevPercent=' + partnerRevPercent + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcDigitalAOV=' + d.digitalAOV + '; expires=' + now.toGMTString() + '; path=/;';
          document.cookie = 'calcTraditionalAOV=' + d.traditionalAOV + '; expires=' + now.toGMTString() + '; path=/;';
          // jQuery('#modal, #intro').delay(1000).fadeOut(function() {
          jQuery('#modal, #intro').fadeOut().promise().done(function() {
            jQuery('html, body').animate({scrollTop: 0}, 'slow').promise().done(function() {
              jQuery('#results-page').fadeIn(function() {
                $scope.drawGraph();
              });
            });
          });
      //   },
      //   error: function(err) {
      //     console.log(err);
      //   }
      // });
    });
  });
};

$scope.closeModal = function() {
  jQuery('#modal').fadeOut();
  jQuery('html, body').removeClass('clicked');
};

$scope.updateTotals = function() {
    // Replace values with assumptions if empty
    // P = placeholder
    // non-scope variables are so we can proceed with calculations without changing the input values
    var totalRev = d.totalRev;
    var digitalRevPercent = d.digitalRevPercent;
    var directRevPercent = d.traditionalRevPercent / 2;
    var insideRevPercent = d.traditionalRevPercent / 4;
    var partnerRevPercent = d.traditionalRevPercent / 4;
    var digitalAOV = d.digitalAOV;
    var directAOV = d.traditionalAOV;
    var insideAOV = d.traditionalAOV;
    var partnerAOV = d.traditionalAOV;
    var digitalError = d.digitalErrorP / 100;
    var directError = d.directErrorP / 100;
    var insideError = d.insideErrorP / 100;
    var partnerError = d.partnerErrorP / 100;
    var digitalTeamSize = d.digitalTeamSizeP;
    var directTeamSize = d.directTeamSizeP;
    var insideTeamSize = d.insideTeamSizeP;
    var digitalSalary = d.digitalSalaryP;
    var directSalary = d.directSalaryP;
    var insideSalary = d.insideSalaryP;
    var digitalIncrease = d.digitalIncreaseP / 100;
    var businessBump = d.businessBumpP / 100;
    var crossSell = d.crossSellP / 100;
    var newProduct = d.newProductP / 100;

    d.digitalAOVIncrease = businessBump + crossSell + newProduct;

    // Start before
    d.digitalRev = d.totalRev * (digitalRevPercent / 100);
    d.directRev = d.totalRev * (directRevPercent / 100);
    d.insideRev = d.totalRev * (insideRevPercent / 100);
    d.partnerRev = d.totalRev * (partnerRevPercent / 100);

    d.digitalOrders = (isFinite(d.digitalRev / digitalAOV)) ? (d.digitalRev / digitalAOV) : 0;
    d.directOrders = (isFinite(d.directRev / directAOV)) ? (d.directRev / directAOV) : 0;
    d.insideOrders = (isFinite(d.insideRev / insideAOV)) ? (d.insideRev / insideAOV) : 0;
    d.partnerOrders = (isFinite(d.partnerRev / partnerAOV)) ? (d.partnerRev / partnerAOV) : 0;

    d.digitalNumOrderErrors = d.digitalOrders * digitalError;
    d.directNumOrderErrors = d.directOrders * directError;
    d.insideNumOrderErrors = d.insideOrders * insideError;
    d.partnerNumOrderErrors = d.partnerOrders * partnerError;

    d.digitalTeamCost = digitalTeamSize * digitalSalary;
    d.directTeamCost = directTeamSize * directSalary;
    d.insideTeamCost = insideTeamSize * insideSalary;

    d.digitalTotalTeamCost = d.digitalTeamCost + d.digitalSystemsCost;
    d.directTotalTeamCost = d.directTeamCost + d.directSystemsCost;
    d.insideTotalTeamCost = d.insideTeamCost + d.insideSystemsCost;

    d.totalSystemsCost = d.digitalSystemsCost + d.directSystemsCost + d.insideSystemsCost;
    d.totalTeamCost = d.digitalTeamCost + d.directTeamCost + d.insideTeamCost;

    d.digitalCostPerMinute = d.digitalTotalTeamCost / 525600;
    d.directCostPerMinute = d.directTotalTeamCost / 124800;
    d.insideCostPerMinute = d.insideTotalTeamCost / 124800;

    d.digitalCostPerError = (d.digitalNumOrderErrors * (20 * d.digitalCostPerMinute)) / d.digitalNumOrderErrors;
    d.directCostPerError = (d.directNumOrderErrors * (60 * d.directCostPerMinute)) / d.directNumOrderErrors;
    d.insideCostPerError = (d.insideNumOrderErrors * (60 * d.insideCostPerMinute)) / d.insideNumOrderErrors;
    d.partnerCostPerError = (d.partnerNumOrderErrors * (60 * d.insideCostPerMinute)) / d.partnerNumOrderErrors;

    d.digitalErrorCost = isFinite(d.digitalNumOrderErrors * d.digitalCostPerError) ? d.digitalNumOrderErrors * d.digitalCostPerError : 0;
    d.directErrorCost = isFinite(d.directNumOrderErrors * d.directCostPerError) ? d.directNumOrderErrors * d.directCostPerError : 0;
    d.insideErrorCost = isFinite(d.insideNumOrderErrors * d.insideCostPerError) ? d.insideNumOrderErrors * d.insideCostPerError : 0;
    d.partnerErrorCost = isFinite(d.partnerNumOrderErrors * d.partnerCostPerError) ? d.partnerNumOrderErrors * d.partnerCostPerError : 0;
    d.totalErrorCost = d.digitalErrorCost + d.directErrorCost + d.insideErrorCost + d.partnerErrorCost;

    d.digitalSystemPersonelCost = d.digitalTotalTeamCost;
    d.directSystemPersonelCost = d.directSystemsCost;
    d.insideSystemPersonelCost = d.insideSystemsCost;

    d.digitalCostPerOrder = d.digitalOrders > 0 ? d.digitalSystemPersonelCost / d.digitalOrders : 0;
    d.directCostPerOrder = 60 * d.directCostPerMinute;
    d.insideCostPerOrder = 30 * d.insideCostPerMinute;

    d.digitalCostToServe = (d.digitalOrders * d.digitalCostPerOrder) + d.digitalSystemPersonelCost;
    d.directCostToServe = (d.directOrders * d.directCostPerOrder) + d.directSystemPersonelCost;
    d.insideCostToServe = (d.insideOrders * d.insideCostPerOrder) + d.insideSystemPersonelCost;
    d.partnerCostToServe = d.partnerContribution * d.partnerRev;
    d.totalCostToServe = d.digitalCostToServe + d.directCostToServe + d.insideCostToServe + d.partnerCostToServe;

    d.digitalTotalCost = isFinite(d.digitalCostToServe + d.digitalErrorCost) ? d.digitalCostToServe + d.digitalErrorCost : 0;
    d.directTotalCost = isFinite(d.directCostToServe + d.directErrorCost) ? d.directCostToServe + d.directErrorCost : 0;
    d.insideTotalCost = isFinite(d.insideCostToServe + d.insideErrorCost) ? d.insideCostToServe + d.insideErrorCost : 0;
    d.partnerTotalCost = isFinite(d.partnerCostToServe + d.partnerErrorCost) ? d.partnerCostToServe + d.partnerErrorCost : 0;
    d.totalCost = d.digitalTotalCost + d.directTotalCost + d.insideTotalCost + d.partnerTotalCost;

    d.digitalMargin = d.digitalRev - d.digitalTotalCost;
    d.directMargin = d.directRev - d.directTotalCost;
    d.insideMargin = d.insideRev - d.insideTotalCost;
    d.partnerMargin = d.partnerRev - d.partnerTotalCost;
    d.totalMargin = totalRev - d.totalCost;

    d.digitalMarginPercent = d.digitalMargin / d.digitalRev;
    d.directMarginPercent = d.directMargin / d.directRev;
    d.insideMarginPercent = d.insideMargin / d.insideRev;
    d.partnerMarginPercent = d.partnerMargin / d.partnerRev;
    d.totalMarginPercent = d.totalMargin / totalRev;
    // End before

    // Start after
    d.directOrdersShift = d.directOrders * d.directShift;
    d.insideOrdersShift = d.insideOrders * d.insideShift;
    d.partnerOrdersShift = d.partnerOrders * d.partnerShift;

    d.digitalOrders2 = (d.digitalOrders * (1 + digitalIncrease)) + (d.directOrdersShift + d.insideOrdersShift + d.partnerOrdersShift);
    d.directOrders2 = d.directOrders - d.directOrdersShift;
    d.insideOrders2 = d.insideOrders - d.insideOrdersShift;
    d.partnerOrders2 = d.partnerOrders - d.partnerOrdersShift;

    d.directOrdersPercent = d.directOrdersShift / d.digitalOrders2;
    d.insideOrdersPercent = d.insideOrdersShift / d.digitalOrders2;
    d.partnerOrdersPercent = d.partnerOrdersShift / d.digitalOrders2;

    d.digitalOrdersShift = d.digitalOrders2 - (d.directOrdersShift + d.insideOrdersShift + d.partnerOrdersShift);
    d.digitalOrdersPercent = 1 - (d.directOrdersPercent + d.insideOrdersPercent + d.partnerOrdersPercent);

    d.directAOV2 = directAOV;
    d.insideAOV2 = insideAOV;
    d.partnerAOV2 = partnerAOV;
    d.digitalAOV2 = ((d.directOrdersPercent * d.directAOV2) + (d.insideOrdersPercent * d.insideAOV2) + (d.partnerOrdersPercent * d.partnerAOV2) + (d.digitalOrdersPercent * digitalAOV)) * (1 + d.digitalAOVIncrease);

    d.digitalRev2 = d.digitalOrders2 * d.digitalAOV2;
    d.directRev2 = d.directOrders2 * d.directAOV2;
    d.insideRev2 = d.insideOrders2 * d.insideAOV2;
    d.partnerRev2 = d.partnerOrders2 * d.partnerAOV2;
    d.totalRev2 = d.digitalRev2 + d.directRev2 + d.insideRev2 + d.partnerRev2;

    d.digitalRevPercent2 = d.digitalRev2 / d.totalRev2;
    d.directRevPercent2 = d.directRev2 / d.totalRev2;
    d.insideRevPercent2 = d.insideRev2 / d.totalRev2;
    d.partnerRevPercent2 = d.partnerRev2 / d.totalRev2;

    d.digitalError2 = 0;
    d.directError2 = d.directShift > 0 ? directError / 2 : directError;
    d.insideError2 = d.insideShift > 0 ? insideError / 2 : insideError;
    d.partnerError2 = d.partnerShift > 0 ? partnerError / 2 : partnerError;

    d.digitalNumOrderErrors2 = 0;
    d.directNumOrderErrors2 = d.directOrders2 * d.directError2;
    d.insideNumOrderErrors2 = d.insideOrders2 * d.insideError2;
    d.partnerNumOrderErrors2 = d.partnerOrders2 * d.partnerError2;

    d.digitalTeamCost2 = 3 * digitalSalary;
    d.directTeamCost2 = d.directTeamCost2;
    d.insideTeamCost2 = d.insideTeamCost2;

    d.digitalTotalTeamCost2 = d.digitalTeamCost2 + d.digitalSystemsCost2;
    d.directTotalTeamCost2 = d.directTotalTeamCost;
    d.insideTotalTeamCost2 = d.insideTotalTeamCost;

    d.totalSystemsCost2 = d.digitalSystemsCost2 + d.directSystemsCost + d.insideSystemsCost;
    d.totalTeamCost2 = d.digitalTeamCost2 + d.directTeamCost + d.insideTeamCost;

    d.digitalCostPerMinute2 = d.digitalTotalTeamCost2 / 525600;
    d.directCostPerMinute2 = d.directCostPerMinute;
    d.insideCostPerMinute2 = d.insideCostPerMinute;

    d.digitalCostPerError2 = 0;
    d.directCostPerError2 = (d.directNumOrderErrors2 * (60 * d.directCostPerMinute2)) / d.directNumOrderErrors2;
    d.insideCostPerError2 = (d.insideNumOrderErrors2 * (60 * d.insideCostPerMinute2)) / d.insideNumOrderErrors2;
    d.partnerCostPerError2 = (d.partnerNumOrderErrors2 * (60 * d.insideCostPerMinute2)) / d.partnerNumOrderErrors2;

    d.digitalErrorCost2 = 0;
    d.directErrorCost2 = isFinite(d.directNumOrderErrors2 * d.directCostPerError2) ? d.directNumOrderErrors2 * d.directCostPerError2 : 0;
    d.insideErrorCost2 = isFinite(d.insideNumOrderErrors2 * d.insideCostPerError2) ? d.insideNumOrderErrors2 * d.insideCostPerError2 : 0;
    d.partnerErrorCost2 = isFinite(d.partnerNumOrderErrors2 * d.partnerCostPerError2) ? d.partnerNumOrderErrors2 * d.partnerCostPerError2 : 0;
    d.totalErrorCost2 = d.digitalErrorCost2 + d.directErrorCost2 + d.insideErrorCost2 + d.partnerErrorCost2;

    d.digitalSystemPersonelCost2 = d.digitalTotalTeamCost2;
    d.directSystemPersonelCost2 = d.directSystemsCost;
    d.insideSystemPersonelCost2 = d.insideSystemsCost;

    d.digitalCostPerOrder2 = d.digitalSystemPersonelCost2 / d.digitalOrders2;
    d.directCostPerOrder2 = 60 * d.directCostPerMinute2;
    d.insideCostPerOrder2 = 30 * d.insideCostPerMinute2;

    d.digitalCostToServe2 = (d.digitalOrders2 * d.digitalCostPerOrder2) + d.digitalSystemPersonelCost2;
    d.directCostToServe2 = (d.directOrders2 * d.directCostPerOrder2) + d.directSystemPersonelCost2;
    d.insideCostToServe2 = (d.insideOrders2 * d.insideCostPerOrder2) + d.insideSystemPersonelCost2;
    d.partnerCostToServe2 = d.partnerContribution * d.partnerRev2;
    d.totalCostToServe2 = d.digitalCostToServe2 + d.directCostToServe2 + d.insideCostToServe2 + d.partnerCostToServe2;

    d.digitalTotalCost2 = isFinite(d.digitalCostToServe2 + d.digitalErrorCost2) ? (d.digitalCostToServe2 + d.digitalErrorCost2) : 0;
    d.directTotalCost2 = isFinite(d.directCostToServe2 + d.directErrorCost2) ? (d.directCostToServe2 + d.directErrorCost2) : 0;
    d.insideTotalCost2 = isFinite(d.insideCostToServe2 + d.insideErrorCost2) ? (d.insideCostToServe2 + d.insideErrorCost2) : 0;
    d.partnerTotalCost2 = isFinite(d.partnerCostToServe2 + d.partnerErrorCost2) ? (d.partnerCostToServe2 + d.partnerErrorCost2) : 0;
    d.totalCost2 = d.digitalTotalCost2 + d.directTotalCost2 + d.insideTotalCost2 + d.partnerTotalCost2;

    d.digitalMargin2 = d.digitalRev2 - d.digitalTotalCost2;
    d.directMargin2 = d.directRev2 - d.directTotalCost2;
    d.insideMargin2 = d.insideRev2 - d.insideTotalCost2;
    d.partnerMargin2 = d.partnerRev2 - d.partnerTotalCost2;
    d.totalMargin2 = d.totalRev2 - d.totalCost2;

    d.digitalMarginPercent2 = d.digitalMargin2 / d.digitalRev2;
    d.directMarginPercent2 = d.directMargin2 / d.directRev2;
    d.insideMarginPercent2 = d.insideMargin2 / d.insideRev2;
    d.partnerMarginPercent2 = d.partnerMargin2 / d.partnerRev2;
    d.totalMarginPercent2 = d.totalMargin2 / d.totalRev2;
    // End after


    d.growthRate = (d.totalRev2 - totalRev) / totalRev;
    d.marginImpact = (d.totalMargin2 - d.totalMargin) / d.totalMargin;
    if (digitalRevPercent == 0) {
      d.marginMinusDigital = d.digitalRev2 - d.digitalRev;
    } else {
      d.marginMinusDigital = (digitalAOV * (1 + digitalIncrease) * (1 + d.digitalAOVIncrease) * d.digitalOrders) - d.digitalTotalCost2;
    }
    d.totalRevX = totalRev;
    d.totalRevY1 = d.totalRevX * (1 + d.growthRate);
    d.totalRevY2 = d.totalRevY1 * (1 + d.growthRate);
    d.totalRevY3 = d.totalRevY2 * (1 + d.growthRate);
    d.totalMarginY1 = d.totalMargin * (1 + d.marginImpact);
    d.totalMarginY2 = d.totalMarginY1 * (1 + d.marginImpact);
    d.totalMarginY3 = d.totalMarginY2 * (1 + d.marginImpact);
    d.totalMarginY4 = d.totalMarginY3 * (1 + d.marginImpact);
    d.totalRevIncrease = d.totalRev2 - totalRev;
    d.totalCostSavings = d.totalCost - d.totalCost2;
    d.totalMarginIncrease = d.totalMargin2 - d.totalMargin;
    d.roi = ((d.marginMinusDigital - d.digitalSystemPersonelCost2 - d.digitalMargin) / d.digitalSystemsCost2) * 100;
  };

  $scope.drawGraph = function() {
    var quickData = google.visualization.arrayToDataTable([
      ['Channel', 'Before', {role: 'style'}, 'After', {role: 'style'}],
      ['Digital Gross Margins', Math.round(d.digitalMargin), 'color: #cfe6f7', Math.round(d.digitalMargin2), 'color: #8cc6ec'],
      ['Traditional Gross Margins', Math.round(d.directMargin + d.insideMargin + d.partnerMargin), 'color: #e1f1f1', Math.round(d.directMargin2 + d.insideMargin2 + d.partnerMargin2), 'color: #48bab4']
      ]);

    var quickOptions = {
      vAxis: {
        format: '$#,###',
        viewWindow: {
          min: 0
        }
      },
      legend: {
        position: 'none'
      },
      colors: ['#cfe6f7', '#8cc6ec', '#e1f1f1', '#4bb9b4']
    };

    var quick = new google.visualization.ColumnChart(document.getElementById('quickChart'));
    var quick2 = new google.visualization.ColumnChart(document.getElementById('quickChart2'));
    google.visualization.events.addListener(quick2, 'ready', function() {
      d.quickGraph = quick2.getImageURI();
      jQuery.ajax({
        url: ajaxVar.ajax_url,
        method: 'post',
        data: {
          action: 'generate_report',
          id: d.id,
          email: d.email,
          roi: $filter('number')(d.roi, 0) + '%',
          totalRev: $filter('currency')(d.totalRevX, '$', 0),
          totalRev2: $filter('currency')(d.totalRev2, '$', 0),
          totalRevIncrease: $filter('currency')(d.totalRevIncrease, '$', 0),
          totalMargin: $filter('currency')(d.totalMargin, '$', 0),
          totalMargin2: $filter('currency')(d.totalMargin2, '$', 0),
          totalMarginIncrease: $filter('currency')(d.totalMarginIncrease, '$', 0),
          digitalRevPercent: $filter('number')(d.digitalRevPercent, 1) + '%',
          digitalRevPercent2: $filter('number')(d.digitalRevPercent2 * 100, 1) + '%',
          quickGraph: d.quickGraph
        },
        success: function(res) {
          if (res != 0) {
            d.url = res;
            jQuery('.download').removeClass('disabled');
            $scope.$apply();
          }
        },
        error: function(err) {
          console.log(err);
        }
      });
    });
    quick.draw(quickData, quickOptions);
    quick2.draw(quickData, quickOptions);
    // End results
  };

  google.charts.load('current', {packages:['corechart']});
  google.charts.setOnLoadCallback(function() {
    $scope.drawGraph();
  });

}]);

app.directive('commas', function() {
  return {
    restrict: 'C',
    link: function(scope, element, attrs) {
      if (scope.data[attrs.ngModel.slice(5, -1)] || scope.data[attrs.ngModel.slice(5, -1)]==0) {
        scope.data[attrs.ngModel.slice(5)] = commafy(scope.data[attrs.ngModel.slice(5, -1)]);
      }
      element.on('input', function() {
        if (element[0].value === '') {
          scope.data[attrs.ngModel.slice(5, -1)] = undefined;
          scope.$apply();
          return;
        }
        var v = parseInt(uncommafy(element[0].value));
        if (v > attrs.max) {
          element[0].value = commafy(attrs.max);
        } else if (v < attrs.min) {
          element[0].value = commafy(attrs.min);
        } else {
          element[0].value = commafy(v);
        }
        scope.data[attrs.ngModel.slice(5, -1)] = v;
        scope.$apply();
      });
    }
  };
});

// Align tooltips with corresponding questions
jQuery('.tooltip section[target]').each(function() {
  jQuery(this).position({
    my: 'top',
    at: 'top',
    of: jQuery(this).attr('target'),
    collision: 'none'
  });
});

// Tile Validation
jQuery('.tile-radio').on('change', function() {
  jQuery('.tile-radio + label').removeClass('ng-invalid');
});

// Actually enfore the min/max for inputs
jQuery('input[type=number]').on('input keypress', function(e) {
  if (e.key=='-' || e.key=='.' || e.key=='+') {
    return false;
  }
  if (jQuery(this).val() > parseInt(jQuery(this).attr('max'))) {
    jQuery(this).val(jQuery(this).attr('max'));
  } else if (jQuery(this).val() < parseInt(jQuery(this).attr('min'))) {
    jQuery(this).val(jQuery(this).attr('min'));
  }
});

function commafy(n) {
  if (isFinite(n)) {
    var s = n.toString();
    return s.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
  } else {
    return '';
  }
}
function uncommafy(s) {
  return s.replace(/\D|\./g, '');
}

function periods() {
  if (jQuery('.loading h2').html() == 'Calculating') {
    jQuery('.loading h2').html('Calculating.')
  } else if (jQuery('.loading h2').html() == 'Calculating.') {
    jQuery('.loading h2').html('Calculating..')
  } else if (jQuery('.loading h2').html() == 'Calculating..') {
    jQuery('.loading h2').html('Calculating...')
  } else {
    jQuery('.loading h2').html('Calculating')
  }
}

jQuery('.download').on('click', function() {
  ga('send', 'event', 'ROI Calculator Progress', 'Clicked Download Industry ROI Report', 'Step 2');
});

jQuery('.customize').on('click', function() {
  ga('send', 'event', 'ROI Calculator Progress', 'Clicked Customize My ROI', 'Step 2');
});
