package tourdreams.com.br;

import android.content.Context;
import android.content.Intent;
import android.nfc.Tag;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomSheetBehavior;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class PesquisarProduto extends AppCompatActivity {

    Context context;

    ListView list_view_produto_busca;
    List<ProdutosBusca> list_produto_busca = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pesquisar_produto);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        context = this;

        list_view_produto_busca = (ListView) findViewById(R.id.list_resultado_busca);

        list_produto_busca.add (new ProdutosBusca(R.drawable.olimpia, "Olympia Residence", "Vila Olímpia, São Paulo - 7,3 km do centro", "4,5", "R$ 397,95"));
        list_produto_busca.add (new ProdutosBusca(R.drawable.sheraton, "Sheraton WTC Hotel", "Brooklin Novo, São Paulo - 9,1 km do centro", "4,0", "R$ 450,95"));
        list_produto_busca.add (new ProdutosBusca(R.drawable.hilton, "Hilton Morumbi", "Brooklin Novo, São Paulo - 9,3 km do centro", "4,7", "R$ 475,95"));
        list_produto_busca.add (new ProdutosBusca(R.drawable.gran, "Gran Estanplaza Berrini", "Brooklin Novo, São Paulo - 9,2 km do centro", "4,5", "R$ 350,95"));
        list_produto_busca.add (new ProdutosBusca(R.drawable.bourbon, "Bourbon Convention", "Moema, São Paulo - 7,3 km do centro", "4,9", "R$ 268,80"));

        ProdutosBuscaAdapter produtosBuscaAdapter = new ProdutosBuscaAdapter(this, R.layout.list_item_resultado_busca, list_produto_busca);
        list_view_produto_busca.setAdapter(produtosBuscaAdapter);

    }




    @Override
    public boolean onCreateOptionsMenu(Menu menu) {

        getMenuInflater().inflate(R.menu.main, menu);

        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {

        menu.findItem(R.id.filtro_busca).setVisible(true);

        return super.onPrepareOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == R.id.filtro_busca) {



            //DialogCaixa dialogCaixa = new DialogCaixa();
            //dialogCaixa.show(getFragmentManager(), "dialogCaixa");
        }
        return super.onOptionsItemSelected(item);
    }



}
