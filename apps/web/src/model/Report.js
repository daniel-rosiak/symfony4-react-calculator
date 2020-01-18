export default class Report
{
    static parseToCSV = (data) => {
        const items = data
        const replacer = (key, value) => value === null ? '' : value
        const header = Object.keys(items[0])
        let csv = items.map(row => header.map(fieldName => JSON.stringify(row[fieldName], replacer)).join(','))
        csv.unshift(header.join(','))
        return csv.join('\r\n')
    }

    static downloadAsCSV = (data, fileName) => {
        var dataStr = "data:text/csv;charset=utf-8," + encodeURIComponent(Report.parseToCSV(data));
        var downloadAnchorNode = document.createElement('a');
        downloadAnchorNode.setAttribute("href",     dataStr);
        downloadAnchorNode.setAttribute("download", fileName + ".csv");
        document.body.appendChild(downloadAnchorNode);
        downloadAnchorNode.click();
        downloadAnchorNode.remove();
    }
}