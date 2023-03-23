<!DOCTYPE html>
<html>

<head>
    <title>Calendrier VueJS</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <h1>Calendrier VueJS</h1>
        <label for="date">Entrer une date :</label>
        <input type="date" id="date" v-model="selectedDate" @change="generateCalendar()" />
        <h2>Calendrier des 9 mois suivants :</h2>
        <div v-if="calendar.length" class="weeks">

            <div class="container">
                <div class="row">
                    <div v-for="(week, index) in calendar" :key="index" class="week col-2"
                        :class="index === 1 ? 'box' : ''">
                        <h3>Semaine {{ index + 1 }}</h3>
                        <ul>
                            <li v-for="(day, dayIndex) in week" :key="dayIndex">
                                {{ day }} {{ }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .weeks {
        width: 90%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin: auto;
        flex-wrap: wrap;
        background-color: cyan;
    }

    .week {
        margin: 10px;
        height: auto;
        border-radius: 5px;
        border: 1px rgb(93, 93, 172) solid;
        background-color: rgb(148, 120, 120);
        flex: 1;
    }

    .box {
        background-color: purple;
        border: 2px solid purple;
    }
    </style>

    <script>
    new Vue({
        el: '#app',
        data: {
            selectedDate: '',
            calendar: []
        },
        methods: {
            generateCalendar() {
                const startDate = new Date(this.selectedDate);
                const endDate = new Date(startDate.getFullYear(), startDate.getMonth() + 9, 0);
                const weeks = this.getWeeksArray(startDate, endDate);
                this.calendar = weeks;
            },
            getWeeksArray(startDate, endDate) {
                const weeks = [];
                let currentWeek = [];
                let currentDate = startDate;
                while (currentDate <= endDate) {
                    currentWeek.push(currentDate.toLocaleDateString());
                    currentDate.setDate(currentDate.getDate() + 1);
                    if (currentDate.getDay() === 0 || currentDate > endDate) {
                        weeks.push(currentWeek);
                        currentWeek = [];
                    }
                }
                return weeks;
            }
        }
    });
    </script>
</body>

</html>