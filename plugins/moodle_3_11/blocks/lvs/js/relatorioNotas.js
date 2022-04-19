var $jq = jQuery.noConflict();

function ready(fn) {
    if (document.readyState != 'loading') {
        fn();
    }
    else if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', fn);
    }
    else {
        document.attachEvent('onreadystatechange', function() {
            if (document.readyState != 'loading')
                fn();
        });
    }
}

function filterHtmlTable() {
    const query = q => document.querySelectorAll(q);
    const filters = [...query('th input')].map(e => new RegExp(e.value, 'i'));
  
    query('tbody tr').forEach(row => row.style.display = 
      filters.every((f, i) => f.test(row.cells[i].textContent)) ? '' : 'none');
}

window.ready(function() {
    // Quick and simple export target #table_id into a csv
    function download_table_as_csv(table_id, separator = ',') {
        // Select rows from table_id
        var rows = document.querySelectorAll('table#' + table_id + ' tr');
        // Construct csv
        var csv = [];
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll('td, th');
            for (var j = 0; j < cols.length; j++) {
                var data = cols[j].innerText.replace(/\u00a0/g, '');
                // Clean innertext to remove multiple spaces and jumpline (break csv), 
                // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
                data = data.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ').replace(/"/g, '""');
                // Push escaped string
                row.push('"' + data + '"');
            }
            csv.push(row.join(separator));
        }
        var csv_string = csv.join('\n');
        // Download it
        var filename = '_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        var BOM = "\uFEFF";
        var csvContent = BOM + csv_string;
        link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csvContent));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    var beforePrint = function() {
        //console.log('Funcionalidade para executar antes da impressão.');
        var divBuscaNome = document.getElementById("divBuscaNome");
        divBuscaNome.style.display = "none";
    };
    var afterPrint = function() {
        //console.log('Funcionalidade para executar após a impressão');
        var divBuscaNome = document.getElementById("divBuscaNome");
        divBuscaNome.style.display = "block";
    };
    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint();
            }
            else {
                afterPrint();
            }
        });
    }
    window.onbeforeprint = beforePrint;
    window.onafterprint = afterPrint;

    var btnImprimirRelatorioNotasCsv = document.querySelector('#btnImprimirRelatorioNotasCsv');
    btnImprimirRelatorioNotasCsv.addEventListener('click', function (event) {
        // Don't follow the link
	    event.preventDefault();
        download_table_as_csv('tabelaNotas',';');
    });

    var btnImprimirRelatorioNotasPdf = document.querySelector('#btnImprimirRelatorioNotasPdf');
    btnImprimirRelatorioNotasPdf.addEventListener('click', function (event) {
        // Don't follow the link
	    event.preventDefault();
        beforePrint();
        var elem = document.querySelector('#relatorionotas-content');
        var divContents = elem.innerHTML;
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>Relatório de notas</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        afterPrint();
    });
});
