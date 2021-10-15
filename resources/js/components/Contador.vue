<template>
    <div class="d-flex justify-content-center contador">
        <div class="flex-fill">
            <p class="counter-date text-white">{{ displayDays }}</p>
            <span>Días</span>
        </div>
        <span class="counter-separator">:</span>

        <div class="flex-fill">
            <p class="counter-date text-white">{{ displayHours }}</p>
            <span>Horas</span>
        </div>
        <span class="counter-separator">:</span>

        <div class="flex-fill">
            <p class="counter-date text-white">{{ displayMinutes }}</p>
            <span>Minutos</span>
        </div>
        <span class="counter-separator">:</span>

        <div class="flex-fill">
            <p class="counter-date text-white">{{ displaySeconds }}</p>
            <span>Segundos</span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['year', 'month', 'day', 'hour', 'minute'],

        data() {
            return {
                displayDays: 0,
                displayHours: 0,
                displayMinutes: 0,
                displaySeconds: 0,
                expired: false
            }
        },

        mounted () {
            this.showRemaining();
        },

        methods:{
            showRemaining(){
                const timer = setInterval(() => {
                    const now = new Date();
                    const distance = this.endDate.getTime() - now.getTime();

                    if(distance < 0) {
                        clearInterval(timer);
                        this.expired = true;
                        return;
                    }

                    const days = Math.floor(distance / this._days);
                    const hours = Math.floor((distance % this._days) / this._hours);
                    const minutes = Math.floor((distance % this._hours) / this._minutes);
                    const seconds = Math.floor((distance % this._minutes) / this._seconds);

                    this.displayMinutes = this.formatNumber(minutes);
                    this.displaySeconds = this.formatNumber(seconds);
                    this.displayHours = this.formatNumber(hours);
                    this.displayDays = this.formatNumber(days);

                }, 1000);
            },

            formatNumber(num){
                return num < 10 ? '0' + num : num;
            }
        },

        computed: {
            _seconds(){
               return 1000;
            },
            _minutes(){
               return this._seconds * 60;
            },
            _hours(){
               return this._minutes * 60;
            },
            _days(){
               return this._hours * 24;
            },
            endDate(){
                return new Date(
                    this.year,
                    this.month-1,
                    this.day,
                    this.hour,
                    this.minute,
                    0
                )
            }

        },
    }
</script>

<style lang="scss" scoped>
    .contador{ max-width: 500px; margin: 0 auto;
        .counter-date{font-size: 2.5rem; height: 3rem;}
        .counter-separator{font-size: 2.5rem;}
    }
</style>
