const Progress = require('progressbar.js');


window.initDashboardView = (test) => {
    console.log(test)

    new Progress.Circle('#progress-bar', {
        color: '#FCB03C',
        strokeWidth: 3,
        trailWidth: 1,
        text: {
            value: '10'
        }
    })
    
}