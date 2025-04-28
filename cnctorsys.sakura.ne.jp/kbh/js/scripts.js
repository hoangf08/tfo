'use strict';
// const now = new Date('');
// // const now = new Date('2024/08/01');

// const bus1 = document.querySelector('#bus1');
// const map4 = document.querySelector('#map4');
// const oldMap = document.querySelector('#old-map');

// const august = new Date('2024/08/01');
// if (august >= now) {
//   oldMap.style.display = 'none';
// } else {
//   bus1.style.display = 'none';
// }

let now = new Date();
const bannerContainer = document.querySelector('.banner-container');
const couponContainer = document.querySelector('.couponContainer');
const coupon1 = document.querySelector('#coupon1');
const coupon2 = document.querySelector('#coupon2');
const couponGroup = document.querySelector('#couponGroup');
// console.log(bannerContainer, couponContainer, coupon1);

const startDate1 = new Date('2025/03/28 9:59:59');
const startDate2 = new Date('2025/03/28 9:59:59');
const endDate = new Date('2025/04/15 23:59:59');

// now = new Date('2025/01/16 23:59:59'); 

if (startDate1 < now && now < endDate) {
couponContainer.style.cssText = 'width: 901px; margin: 0 auto; display:block; text-align: center;';
}

if (startDate1 < now && now < endDate) {
coupon1.style.display = 'block';
}
if (startDate2 < now && now < endDate) {
coupon2.style.display = 'block';
}

const usu = document.querySelector('#usu')
const ss_plan = document.querySelector('#ss-plan')
const startDate_ss_plan = new Date('2025/03/04 19:59:59');
const endDate_ss_plan = new Date('2025/03/21 00:00:00');

if (startDate_ss_plan < now && now < endDate_ss_plan) {
    usu.style.display = 'none';
    ss_plan.style.display = 'block';
}