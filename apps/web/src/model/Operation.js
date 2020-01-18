export default class Operation {

    static operations =
    {
        'add': '+',
        'subtract': '-',
        'multiply': '*',
        'divide': '/',
        'power': 'pow',
        'root': 'root',
        'factorial': 'n!',
        'percent': '%'
    };

    static getSymbol(symbol) {
        return Operation.operations[symbol];
    }
}