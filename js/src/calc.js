var app = angular.module('CalcApp', []);

app.controller('CalcController', ['$scope', '$filter', '$window', '$timeout', function CalcController($scope, $filter, $window, $timeout) {
  $scope.data = [];
  var d = $scope.data;
  var prevRev = 0;
  var newRev = 0;
  var prevMargin = 0;
  var newMargin = 0;
  d.totalRevIncrease = 0;
  d.totalMarginIncrease = 0;

  if (getCookie('calcComplete')) {
    d.id = getCookie('calcComplete');
  }
  else {
    $window.location.href = $window.location.origin + '/resources/roi-calculator/';
  }
  d.email = getCookie('calcEmail');
  d.industry = getCookie('calcIndustry') || 'other';
  d.commerce = getCookie('calcCommerce') || 'legacy';
  d.totalRevP = parseInt(getCookie('calcTotalRev')) || 400000000;
  d.digitalRevPercentP = getCookie('calcDigitalRevPercent') ? parseInt(getCookie('calcDigitalRevPercent')) : 20;
  d.directRevPercentP = parseInt(getCookie('calcDirectRevPercent')) || 40;
  d.insideRevPercentP = parseInt(getCookie('calcInsideRevPercent')) || 20;
  d.partnerRevPercentP = parseInt(getCookie('calcPartnerRevPercent')) || 20;
  d.digitalAOVP = getCookie('calcDigitalAOV') ? parseInt(getCookie('calcDigitalAOV')) : 1000;
  d.directAOVP = parseInt(getCookie('calcTraditionalAOV')) || 2000;
  d.insideAOVP = parseInt(getCookie('calcTraditionalAOV')) || 2000;
  d.partnerAOVP = parseInt(getCookie('calcTraditionalAOV')) || 2000;

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

  $scope.$watch('[data.totalRev, data.digitalRevPercent, data.directRevPercent, data.insideRevPercent, data.partnerRevPercent]', function(newVals, oldVals) {
    newVals[0] = newVals[0]===null || newVals[0]===undefined ? d.totalRevP : newVals[0];
    newVals[1] = newVals[1]===null || newVals[1]===undefined ? d.digitalRevPercentP : newVals[1];
    newVals[2] = newVals[2]===null || newVals[2]===undefined ? d.directRevPercentP : newVals[2];
    newVals[3] = newVals[3]===null || newVals[3]===undefined ? d.insideRevPercentP : newVals[3];
    newVals[4] = newVals[4]===null || newVals[4]===undefined ? d.partnerRevPercentP : newVals[4];
    if (newVals[1] == 0) {
      d.digitalAOVC = 0;
      d.digitalError = 0;
      d.digitalTeamSize = 0;
      d.digitalSalaryC = 0;
    } else {
      d.digitalAOVC = null;
      d.digitalError = null;
      d.digitalTeamSize = null;
      d.digitalSalaryC = null;
    }
    if (newVals[2] == 0) {
      d.directAOVC = 0;
      d.directError = 0;
      d.directTeamSize = 0;
      d.directSalaryC = 0;
    } else {
      d.directAOVC = null;
      d.directError = null;
      d.directTeamSize = null;
      d.directSalaryC = null;
    }
    if (newVals[3] == 0) {
      d.insideAOVC = 0;
      d.insideError = 0;
      d.insideTeamSize = 0;
      d.insideSalaryC = 0;
    } else {
      d.insideAOVC = null;
      d.insideError = null;
      d.insideTeamSize = null;
      d.insideSalaryC = null;
    }
    if (newVals[4] == 0) {
      d.partnerAOVC = 0;
      d.partnerError = 0;
      d.partnerTeamSize = 0;
      d.partnerSalaryC = 0;
    } else {
      d.partnerAOVC = null;
      d.partnerError = null;
      d.partnerTeamSize = null;
      d.partnerSalaryC = null;
    }
    d.digitalRev = newVals[0] * (newVals[1] / 100);
    d.directRev = newVals[0] * (newVals[2] / 100);
    d.insideRev = newVals[0] * (newVals[3] / 100);
    d.partnerRev = newVals[0] * (newVals[4] / 100);
    d.totalPercent = newVals[1] + newVals[2] + newVals[3] + newVals[4];
  });

  $scope.$watch('[data.digitalAOV, data.directAOV, data.insideAOV, data.partnerAOV]', function(newVals, oldVals) {
    newVals[0] = newVals[0]===null || newVals[0]===undefined ? d.digitalAOVP : newVals[0];
    newVals[1] = newVals[1]===null || newVals[1]===undefined ? d.directAOVP : newVals[1];
    newVals[2] = newVals[2]===null || newVals[2]===undefined ? d.insideAOVP : newVals[2];
    newVals[3] = newVals[3]===null || newVals[3]===undefined ? d.partnerAOVP : newVals[3];
    d.digitalOrders = isFinite(d.digitalRev / newVals[0]) ? (d.digitalRev / newVals[0]) : 0;
    d.directOrders = isFinite(d.directRev / newVals[1]) ? (d.directRev / newVals[1]) : 0;
    d.insideOrders = isFinite(d.insideRev / newVals[2]) ? (d.insideRev / newVals[2]) : 0;
    d.partnerOrders = isFinite(d.partnerRev / newVals[3]) ? (d.partnerRev / newVals[3]) : 0;
  });

  $scope.updateTotals = function() {
    // Replace values with assumptions if empty
    // P = placeholder
    // non-scope variables are so we can proceed with calculations without changing the input values
    var totalRev = d.totalRev===null || d.totalRev===undefined ? d.totalRevP : d.totalRev;
    var digitalRevPercent = d.digitalRevPercent===null || d.digitalRevPercent===undefined ? d.digitalRevPercentP : d.digitalRevPercent;
    var directRevPercent = d.directRevPercent===null || d.directRevPercent===undefined ? d.directRevPercentP : d.directRevPercent;
    var insideRevPercent = d.insideRevPercent===null || d.insideRevPercent===undefined ? d.insideRevPercentP : d.insideRevPercent;
    var partnerRevPercent = d.partnerRevPercent===null || d.partnerRevPercent===undefined ? d.partnerRevPercentP : d.partnerRevPercent;
    var digitalAOV = d.digitalAOV===null || d.digitalAOV===undefined ? d.digitalAOVP : d.digitalAOV;
    var directAOV = d.directAOV===null || d.directAOV===undefined ? d.directAOVP : d.directAOV;
    var insideAOV = d.insideAOV===null || d.insideAOV===undefined ? d.insideAOVP : d.insideAOV;
    var partnerAOV = d.partnerAOV===null || d.partnerAOV===undefined ? d.partnerAOVP : d.partnerAOV;
    var digitalError = d.digitalError===null || d.digitalError===undefined ? d.digitalErrorP / 100 : d.digitalError / 100;
    var directError = d.directError===null || d.directError===undefined ? d.directErrorP / 100 : d.directError / 100;
    var insideError = d.insideError===null || d.insideError===undefined ? d.insideErrorP / 100 : d.insideError / 100;
    var partnerError = d.partnerError===null || d.partnerError===undefined ? d.partnerErrorP / 100 : d.partnerError / 100;
    var digitalTeamSize = d.digitalTeamSize===null || d.digitalTeamSize===undefined ? d.digitalTeamSizeP : d.digitalTeamSize;
    var directTeamSize = d.directTeamSize===null || d.directTeamSize===undefined ? d.directTeamSizeP : d.directTeamSize;
    var insideTeamSize = d.insideTeamSize===null || d.insideTeamSize===undefined ? d.insideTeamSizeP : d.insideTeamSize;
    var digitalSalary = d.digitalSalary===null || d.digitalSalary===undefined ? d.digitalSalaryP : d.digitalSalary;
    var directSalary = d.directSalary===null || d.directSalary===undefined ? d.directSalaryP : d.directSalary;
    var insideSalary = d.insideSalary===null || d.insideSalary===undefined ? d.insideSalaryP : d.insideSalary;
    var digitalIncrease = d.digitalIncrease===null || d.digitalIncrease===undefined ? d.digitalIncreaseP / 100 : d.digitalIncrease / 100;
    var businessBump = d.businessBump===null || d.businessBump===undefined ? d.businessBumpP : d.businessBump;
    var crossSell = d.crossSell===null || d.crossSell===undefined ? d.crossSellP : d.crossSell;
    var newProduct = d.newProduct===null || d.newProduct===undefined ? d.newProductP : d.newProduct;

    d.digitalAOVIncrease = (businessBump + crossSell + newProduct) / 100;

    // Start before
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
    d.breakEvenPoint = d.digitalSystemsCost2 / (d.marginMinusDigital - d.digitalMargin);
    d.breakEvenDay = 365 * d.breakEvenPoint < 0 ? 0 : 365 * d.breakEvenPoint > 1095 ? 1095 : 365 * d.breakEvenPoint;
    d.breakEvenDay = $filter('number')(d.breakEvenDay, 0);
    if (d.breakEvenDay > 365) {
      d.breakEvenYear = Math.floor(d.breakEvenDay / 365);
      while (d.breakEvenDay > 365) {
        d.breakEvenDay -= 365;
      }
      d.breakEvenLine = d.breakEvenYear + ' years and ' + d.breakEvenDay + ' days';
    } else {
      d.breakEvenLine = d.breakEvenDay + ' days';
    }
    d.breakEvenRev =  totalRev * (1 + (d.growthRate * d.breakEvenPoint));
    d.totalRevX = totalRev;
    d.totalRevY1 = d.totalRevX * (1 + d.growthRate);
    d.totalRevY2 = d.totalRevY1 * (1 + d.growthRate);
    d.totalRevY3 = d.totalRevY2 * (1 + d.growthRate);
    d.totalRevY4 = d.totalRevY3 * (1 + d.growthRate);
    d.totalMarginY1 = d.totalMargin * (1 + d.marginImpact);
    d.totalMarginY2 = d.totalMarginY1 * (1 + d.marginImpact);
    d.totalMarginY3 = d.totalMarginY2 * (1 + d.marginImpact);
    d.totalMarginY4 = d.totalMarginY3 * (1 + d.marginImpact);
    d.totalRevIncrease = d.totalRev2 - totalRev;
    d.totalCostSavings = d.totalCost - d.totalCost2;
    d.totalMarginIncrease = d.totalMargin2 - d.totalMargin;
    d.roi = ((d.marginMinusDigital - d.digitalSystemPersonelCost2 - d.digitalMargin) / d.digitalSystemsCost2) * 100;
    newRev = d.totalRevIncrease;
    newMargin = d.totalMarginIncrease;

    var numAnim = new CountUp("revTest", prevRev, newRev, 0, 1);
    numAnim.start();
    var numAnim2 = new CountUp("marginTest", prevMargin, newMargin, 0, 1);
    numAnim2.start();
    prevRev = d.totalRevIncrease;
    prevMargin = d.totalMarginIncrease;
  };

  $scope.drawGraphs = function() {
    console.log('drawing');
    var threeData = google.visualization.arrayToDataTable([
      ['Year', 'Revenue'],
      [0, Math.round(d.totalRevX)],
      [1, Math.round(d.totalRevY1)],
      [2, Math.round(d.totalRevY2)],
      [3, Math.round(d.totalRevY3)]
    ]);

    var oldRevData = google.visualization.arrayToDataTable([
      ['Channel', 'Revenue'],
      ['Digital', Math.round(d.digitalRev)],
      ['Direct Sales', Math.round(d.directRev)],
      ['Inside Sales', Math.round(d.insideRev)],
      ['Partner', Math.round(d.partnerRev)]
    ]);

    var newRevData = google.visualization.arrayToDataTable([
      ['Channel', 'Revenue'],
      ['Digital', Math.round(d.digitalRev2)],
      ['Direct Sales', Math.round(d.directRev2)],
      ['Inside Sales', Math.round(d.insideRev2)],
      ['Partner', Math.round(d.partnerRev2)]
    ]);

    var costsData = google.visualization.arrayToDataTable([
      ['Costs', 'Error Cost', 'Cost to Serve'],
      ['Before Transformation', Math.round(d.totalErrorCost), Math.round(d.totalCostToServe)],
      ['After Transformation', Math.round(d.totalErrorCost2), Math.round(d.totalCostToServe2)]
    ]);

    var marginsData = google.visualization.arrayToDataTable([
      ['Channel', 'Before', {role: 'style'}, 'After', {role: 'style'}],
      ['Digital', Math.round(d.digitalMargin), 'color: #cfe6f7', Math.round(d.digitalMargin2), 'color: #8cc6ec'],
      ['Direct Sales', Math.round(d.directMargin), 'color: #e1f1f1', Math.round(d.directMargin2), 'color: #48bab4'],
      ['Inside Sales', Math.round(d.insideMargin), 'color: #e1f1f1', Math.round(d.insideMargin2), 'color: #48bab4'],
      ['Partner', Math.round(d.partnerMargin), 'color: #e1f1f1', Math.round(d.partnerMargin2), 'color: #48bab4']
    ]);

    var threeOptions = {
      hAxis: {
        format: 'Year #.#',
        gridlines: {
          count: 4
        },
        minorGridlines: {
          count: 1
        }
      },
      vAxis: {
        format: '$#,###'
      },
      series: {
            0: { pointSize: 0, annotationText: 'Break Even' },
            1: { pointSize: 6 }
          },
      legend: {
        position: 'none'
      },
      lineWidth: 2,
      // pointSize: 5,
      colors: ['#036cb6']
    };

    var oldRevOptions = {
      pieHole: 0.75,
      pieSliceText: 'none',
      colors: ['#8cc6ec', '#4bb9b4', '#badedc', '#e1f0ee'],
      pieSliceBorderColor: 'transparent',
      legend: {
        position: 'none'
      }
    };

    var newRevOptions = {
      pieHole: 0.7,
      pieSliceText: 'none',
      colors: ['#8cc6ec', '#4bb9b4', '#badedc', '#e1f0ee'],
      pieSliceBorderColor: 'transparent',
      legend: {
        position: 'none'
      }
    };

    var costsOptions = {
      isStacked: true,
      vAxis: {
        format: '$#,###'
      },
      legend: {
        position: 'none'
      },
      colors: ['#ffa380', '#e2704d']
    };

    var marginsOptions = {
      vAxis: {
        format: '$#,###',
        viewWindow: {
          min: 0
        }
      },
      legend: {
        position: 'none'
      },
      colors: ['#e1f1f1', '#48bab4', '#cfe6f7', '#8cc6ec']
    };

    var three = new google.visualization.LineChart(document.getElementById('threeYearChart'));
    var three2 = new google.visualization.LineChart(document.getElementById('threeYearChart2'));
    var oldRev = new google.visualization.PieChart(document.getElementById('oldRevChart'));
    var newRev = new google.visualization.PieChart(document.getElementById('newRevChart'));
    var costs = new google.visualization.ColumnChart(document.getElementById('costsChart'));
    var costs2 = new google.visualization.ColumnChart(document.getElementById('costsChart2'));
    var margins = new google.visualization.ColumnChart(document.getElementById('marginsChart'));
    var margins2 = new google.visualization.ColumnChart(document.getElementById('marginsChart2'));

    google.visualization.events.addListener(three2, 'ready', function() {
      var x = d.breakEvenPoint < 0 ? 0 : d.breakEvenPoint > 3 ? 3 : d.breakEvenPoint;
      var layout = three.getChartLayoutInterface();
      var chartArea = layout.getChartAreaBoundingBox();
      var svg = three.getContainer().getElementsByTagName('svg')[0];
      var xLoc = layout.getXLocation(x);
      var line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
      line.setAttribute('x1', xLoc);
      line.setAttribute('y1', chartArea.top);
      line.setAttribute('x2', xLoc);
      line.setAttribute('y2', chartArea.top + chartArea.height);
      line.setAttribute('stroke', '#e2704d');
      line.setAttribute('stroke-width', 2);
      svg.appendChild(line);
      d.threeGraph = three2.getImageURI();
    });
    google.visualization.events.addListener(oldRev, 'ready', function() {
      d.oldRevGraph = oldRev.getImageURI();
    });
    google.visualization.events.addListener(newRev, 'ready', function() {
      d.newRevGraph = newRev.getImageURI();
    });
    google.visualization.events.addListener(costs2, 'ready', function() {
      d.costsGraph = costs2.getImageURI();
    });
    google.visualization.events.addListener(margins2, 'ready', function() {
      d.marginsGraph = margins2.getImageURI();
      if (d.num != 7) {
        return;
      }
      console.log('sent');
      jQuery.ajax({
        url: ajaxVar.ajax_url,
        method: 'post',
        data: {
          action: 'generate_report_2',
          id: d.id,
          email: d.email,
          roi: $filter('number')(d.roi, 0) + '%',
          breakEven: d.breakEvenLine,
          industry: d.industry,
          commerce: d.commerce,
          totalRev: $filter('currency')(d.totalRevX, '$', 0),
          totalRev2: $filter('currency')(d.totalRev2, '$', 0),
          totalRevIncrease: $filter('currency')(d.totalRevIncrease, '$', 0),
          totalCost: $filter('currency')(d.totalCost, '$', 0),
          totalCost2: $filter('currency')(d.totalCost2, '$', 0),
          totalCostSavings: $filter('currency')(d.totalCostSavings, '$', 0),
          totalCostSavingsPercent: $filter('number')((d.totalCostSavings / d.totalCost) * 100, 1) + '%',
          totalMargin: $filter('currency')(d.totalMargin, '$', 0),
          totalMargin2: $filter('currency')(d.totalMargin2, '$', 0),
          totalMarginIncrease: $filter('currency')(d.totalMarginIncrease, '$', 0),
          marginImpact: $filter('number')(d.marginImpact * 100, 1) + '%',
          growthRate: $filter('number')(d.growthRate * 100, 1) + '%',
          digitalRevPercent: $filter('number')(d.digitalRevPercent || d.digitalRevPercentP, 1) + '%',
          digitalRevPercent2: $filter('number')(d.digitalRevPercent2 * 100, 1) + '%',
          directRevPercent: $filter('number')(d.directRevPercent || d.directRevPercentP, 1) + '%',
          insideRevPercent: $filter('number')(d.insideRevPercent || d.insideRevPercentP, 1) + '%',
          partnerRevPercent: $filter('number')(d.partnerRevPercent || d.partnerRevPercentP, 1) + '%',
          digitalAOV: $filter('currency')(d.digitalAOV || d.digitalAOVP, '$', 0),
          directAOV: $filter('currency')(d.directAOV || d.directAOVP, '$', 0),
          insideAOV: $filter('currency')(d.insideAOV || d.insideAOVP, '$', 0),
          partnerAOV: $filter('currency')(d.partnerAOV || d.partnerAOVP, '$', 0),
          digitalError: (d.digitalError || d.digitalErrorP) + '%',
          digitalErrorP: (d.digitalErrorP) + '%',
          directError: (d.directError || d.directErrorP) + '%',
          directErrorP: (d.directErrorP) + '%',
          insideError: (d.insideError || d.insideErrorP) + '%',
          insideErrorP: (d.insideErrorP) + '%',
          partnerError: (d.partnerError || d.partnerErrorP) + '%',
          partnerErrorP: (d.partnerErrorP) + '%',
          digitalTeamSize: $filter('number')(d.digitalTeamSize || d.digitalTeamSizeP, 0),
          digitalTeamSizeP: $filter('number')(d.digitalTeamSizeP, 0),
          directTeamSize: $filter('number')(d.directTeamSize || d.directTeamSizeP, 0),
          directTeamSizeP: $filter('number')(d.directTeamSizeP, 0),
          insideTeamSize: $filter('number')(d.insideTeamSize || d.insideTeamSizeP, 0),
          insideTeamSizeP: $filter('number')(d.insideTeamSizeP, 0),
          digitalSalary: $filter('currency')(d.digitalSalary || d.digitalSalaryP, '$', 0),
          digitalSalaryP: $filter('currency')(d.digitalSalaryP, '$', 0),
          directSalary: $filter('currency')(d.directSalary || d.directSalaryP, '$', 0),
          directSalaryP: $filter('currency')(d.directSalaryP, '$', 0),
          insideSalary: $filter('currency')(d.insideSalary || d.insideSalaryP, '$', 0),
          insideSalaryP: $filter('currency')(d.insideSalaryP, '$', 0),
          digitalIncrease: (d.digitalIncrease || d.digitalIncreaseP) + '%',
          digitalIncreaseP: d.digitalIncreaseP + '%',
          businessBump: (d.businessBump || d.businessBumpP) + '%',
          businessBumpP: d.businessBumpP + '%',
          crossSell: (d.crossSell || d.crossSellP) + '%',
          crossSellP: d.crossSellP + '%',
          newProduct: (d.newProduct || d.newProductP) + '%',
          newProductP: d.newProductP + '%',
          threeGraph: d.threeGraph,
          oldRevGraph: d.oldRevGraph,
          newRevGraph: d.newRevGraph,
          costsGraph: d.costsGraph,
          marginsGraph: d.marginsGraph
        },
        success: function(res) {
          d.url = res;
          jQuery('.download').removeClass('disabled');
          $scope.$apply();
        },
        error: function(err) {
          console.log(err);
        }
      });
    });
    three.draw(threeData, threeOptions);
    three2.draw(threeData, threeOptions);
    oldRev.draw(oldRevData, oldRevOptions);
    newRev.draw(newRevData, newRevOptions);
    costs.draw(costsData, costsOptions);
    costs2.draw(costsData, costsOptions);
    margins.draw(marginsData, marginsOptions);
    margins2.draw(marginsData, marginsOptions);
    jQuery('#oldRevChart').append('<span class="oldRevLabel">Digital Channel<br />' + Math.round(d.digitalRevPercent || d.digitalRevPercentP) + '%</span>');
    jQuery('#newRevChart').append('<span class="newRevLabel">Digital Channel<br />' + Math.round(d.digitalRevPercent2 * 100) + '%</span>');
    // End results
  };

  google.charts.load('current', {packages:['corechart']});
  google.charts.setOnLoadCallback(function() {
    if (d.num == 7) {
      $scope.drawGraphs();
    }
  });

  $scope.hashCheck = function() {
    $scope.updateTotals();
    d.num = location.hash.substring(7) || 1;
    if (d.num == 7) {
      jQuery('.total, .gray-bg').fadeOut();
    }
    jQuery('.slide').fadeOut().promise().done(function() {
      jQuery('#slide-' + d.num).css('display', 'flex').hide().fadeIn();
      jQuery('html, body').animate({scrollTop: 0}, 'slow', function() {
        jQuery('.left .slide-section').css({'left': '-25px', 'opacity': '0'});
        jQuery('#slide-' + d.num + ' .left .slide-section').each(function(i) {
          jQuery(this).animate({'opacity': 1, 'left': 0});
        });
        if (!jQuery('.total').is(':visible') && d.num != 7) {
          jQuery('.total, .gray-bg').css('display', 'flex').hide().fadeIn();
        }
        if (google.visualization.LineChart) {
          $scope.drawGraphs();
        }
      });
    });
    var progressWidth;
    if (d.num == 7) {
      jQuery('.download').addClass('disabled');
      progressWidth = 100;
    } else {
      progressWidth = ((d.num - 1) * 15) + 5;
    }
    jQuery('.current-progress').css('width', progressWidth + '%');
    if (d.num >= 2) {
      jQuery('#revenue').addClass('complete');
    } else {
      jQuery('#revenue').removeClass('complete');
    }
    if (d.num >= 3) {
      jQuery('#orderValue').addClass('complete');
    } else {
      jQuery('#orderValue').removeClass('complete');
    }
    if (d.num >= 4) {
      jQuery('#error').addClass('complete');
    } else {
      jQuery('#error').removeClass('complete');
    }
    if (d.num >= 5) {
      jQuery('#team').addClass('complete');
    } else {
      jQuery('#team').removeClass('complete');
    }
    if (d.num >= 6) {
      jQuery('#benefits').addClass('complete');
    } else {
      jQuery('#benefits').removeClass('complete');
    }
    if (d.num >= 7) {
      jQuery('#results').addClass('complete');
    } else {
      jQuery('#results').removeClass('complete');
    }
    jQuery('.progress > div').removeClass('current');
    jQuery('.progress > div:nth-child(' + (parseInt(d.num) + 1) + ')').addClass('current');
    if (d.num == 1) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Company Slide', 'Step 3');
    }
    if (d.num == 2) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Revenue Slide', 'Step 3');
    }
    if (d.num == 3) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Order Value Slide', 'Step 4');
    }
    if (d.num == 4) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Error Rates Slide', 'Step 5');
    }
    if (d.num == 5) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Team Slide', 'Step 6');
    }
    if (d.num == 6) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Benefits Slide', 'Step 7');
    }
    if (d.num == 7) {
      ga('send', 'event', 'ROI Calculator Progress', 'Moved to Results Slide', 'Step 8');
    }
  };

  // Handle URL changes
  $timeout(function() {
    $scope.hashCheck();
  });
  window.onhashchange = function() {
    $scope.$apply();
    $scope.hashCheck();
  };
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

function checkThreshold(el) {
  var val = el.val() == '' ? parseInt(el.attr('placeholder')) : el.val();
  if (val < parseInt(el.attr('min-threshold'))) {
    el.css('border', '2px solid orange');
    el.parent().next().css('opacity', 1);
  } else if (val > parseInt(el.attr('max-threshold'))) {
    el.css('border', '2px solid orange');
    el.parent().next().css('opacity', 1);
  } else {
    el.css('border', '0');
    el.parent().next().css('opacity', 0);
  }
}
jQuery('input[min-threshold]').on('input', function() {
  checkThreshold(jQuery(this));
});

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

jQuery('#download-top').on('click', function() {
  ga('send', 'event', 'ROI Calculator Progress', 'Clicked Download Custom ROI Report Top', 'Step 9');
});

jQuery('#download-bottom').on('click', function() {
  ga('send', 'event', 'ROI Calculator Progress', 'Clicked Download Custom ROI Report Bottom', 'Step 9');
});
