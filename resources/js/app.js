import './bootstrap';
window.sleepTracker = function () {
    return {
        hour: 22,
        minute: 0,
        history: [],

        saveSleepTime() {
            const time = `${String(this.hour).padStart(2,'0')}:${String(this.minute).padStart(2,'0')}`;

            this.history.push({
                day: "Senin",
                sleep: time
            });

            console.log("Saved:", time);
        }
    }
}