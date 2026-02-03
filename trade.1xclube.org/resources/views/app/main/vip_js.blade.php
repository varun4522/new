<script>
    let productElement = document.getElementById('product');
    let myproductElement = document.getElementById('myproduct');

    let running_productA = document.getElementById('running_product');
    let coming_son = document.getElementById('coming_son');

    let tabActivate1 = document.querySelector('.tabActivate1');
    let tabActivate2 = document.querySelector('.tabActivate2');

    let threeMenu = document.querySelector('.van-tabs__wrap');

    function product()
    {
        tabActivate1.style.background = '#eaeeff';
        tabActivate1.style.color = '#0000a0';

        tabActivate2.style.background = 'rgba(234, 238, 255, .2)';
        tabActivate2.style.color = 'hsla(0, 0%, 100%, .5)';

        threeMenu.style.display = 'block';

        productElement.style.display = 'block';
        myproductElement.style.display = 'none';
    }

    function myproduct()
    {
        tabActivate2.style.background = '#eaeeff';
        tabActivate2.style.color = '#0000a0';

        tabActivate1.style.background = 'rgba(234, 238, 255, .2)';
        tabActivate1.style.color = 'hsla(0, 0%, 100%, .5)';

        threeMenu.style.display = 'none';

        productElement.style.display = 'none';
        myproductElement.style.display = 'block';
    }

    let product_running_class_active = document.querySelector('.product_running_class_active');
    let product_coming_class_active = document.querySelector('.product_coming_class_active');

    function running_product()
    {
        running_productA.style.display = 'block';
        coming_son.style.display = 'none';

        product_running_class_active.style.background = '#0000a0';
        product_running_class_active.querySelector('span').style.color = '#fff';

        product_coming_class_active.style.background = '#fff';
        product_coming_class_active.querySelector('span').style.color = '#000';
    }

    function coming_product()
    {
        running_productA.style.display = 'none';
        coming_son.style.display = 'block';

        product_running_class_active.style.background = '#fff';
        product_running_class_active.querySelector('span').style.color = '#1a1a1a';

        product_coming_class_active.style.background = '#0000a0';
        product_coming_class_active.querySelector('span').style.color = '#fff';
    }

    let myRunningPlansArea = document.querySelector('.myRunningPlansArea');
    let myExpiredPlansArea = document.querySelector('.myExpiredPlansArea');
    let aaaaa = document.querySelectorAll('.aaaaa');
    // van-tab--active
    function myRunningPlan(_this)
    {
        for (let i=0;i<aaaaa.length;i++){
            if(aaaaa[i].classList.contains('van-tab--active')){
                aaaaa[i].classList.remove('van-tab--active')
            }
        }

        _this.classList.add('van-tab--active');
        myRunningPlansArea.style.display = 'block';
        myExpiredPlansArea.style.display = 'none';
    }

    function myExpiredPlan(_this)
    {
        for (let i=0;i<aaaaa.length;i++){
            if(aaaaa[i].classList.contains('van-tab--active')){
                aaaaa[i].classList.remove('van-tab--active')
            }
        }

        _this.classList.add('van-tab--active');
        myRunningPlansArea.style.display = 'none';
        myExpiredPlansArea.style.display = 'block';
    }

    $('.tab-menu li a').on('click', function(){
        var target = $(this).attr('data-rel');
        $('.tab-menu li a').removeClass('active');
        $(this).addClass('active');
        $("#"+target).fadeIn('slow').siblings(".tab-box").hide();
        return false;
    });

    // Function to handle plan expiration based on duration_hours
    function checkPlanExpiration() {
        // Assuming plans data is available in a global variable or fetched via AJAX
        // For demonstration, let's assume data is in window.plansData
        if (window.plansData) {
            window.plansData.forEach(function(plan) {
                if (plan.duration_hours) {
                    var startTime = new Date(plan.created_at); // Plan start time
                    var endTime = new Date(startTime);
                    endTime.setHours(endTime.getHours() + plan.duration_hours); // Expiration time

                    if (new Date() >= endTime) {
                        console.log(`Plan ${plan.name} has expired.`);
                        // Update UI to show expired status
                        $(`#plan-${plan.id}`).addClass('expired').find('.status').text('Expired');
                        $(`#claim-button-${plan.id}`).prop('disabled', true).text('Expired');
                    } else {
                        console.log(`Plan ${plan.name} is still active.`);
                        var remainingTime = Math.ceil((endTime - new Date()) / (1000 * 60)); // Remaining time in minutes
                        $(`#plan-${plan.id}`).find('.remaining-time').text(`Remaining: ${remainingTime} mins`);
                        $(`#claim-button-${plan.id}`).prop('disabled', false).text(`Claim Now (${remainingTime} mins left)`);
                    }
                }
            });
        }
    }

    // Call the function on page load
    $(document).ready(function() {
        checkPlanExpiration();
    });

