package tourdreams.com.br;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.BitmapDrawable;
import android.graphics.drawable.Drawable;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.GridView;
import android.widget.ListView;
import android.widget.RatingBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.squareup.picasso.Picasso;

import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.Executor;
import java.util.concurrent.ForkJoinPool;

public class    DetalhesProduto extends AppCompatActivity {

    ListView list_view_comentarios;
    List<Comentarios> list_comentarios = new ArrayList<>();

    List<Caracteristicas> list_caracteristicas = new ArrayList<>();

    GridView grid_view_caracteristicas;

    ArrayAdapter<Caracteristicas> adapter;

    ArrayAdapter<Comentarios> adapter_coment;

    String url, parametros, parametros_coment;
    Integer id_produto_vem;

    Context context;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalhes_produto);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        context = this;

        id_produto_vem = getIntent().getExtras().getInt("id_produto");


        buscarProduto();


        grid_view_caracteristicas = (GridView) findViewById(R.id.grid_view_caracteristicas);
        buscarCaracteristicasProduto();
        buscarAvaliacaoProduto();




        list_view_comentarios = (ListView)findViewById(R.id.list_view_comentarios);
        comentariosProduto();

    }

    private void comentariosProduto() {
        ConnectivityManager connMgr = (ConnectivityManager)this.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()){

            url =  this.getString(R.string.link)+"comentario_produto.php";

            parametros_coment = "id_produto=" + id_produto_vem;

            new DetalhesProduto.preencher_comentarios().execute(url);

        }else{

            Toast.makeText(this, "Nenhuma Conexao foi detectada", Toast.LENGTH_LONG).show();
        }
    }

    public class preencher_comentarios extends AsyncTask<String , Void, String>{


        @Override
        protected String doInBackground(String... urls) {
            return  Conexao.postDados(urls[0], parametros_coment);
        }

        @Override
        protected void onPostExecute(String resultado_comentario) {
            Gson gson = new Gson();
            Comentarios[] comentariosProdutos = gson.fromJson(resultado_comentario, Comentarios[].class);

            for(int i = 0; i < comentariosProdutos.length;i++){

                list_comentarios.add(comentariosProdutos[i]);

            }

            adapter_coment = new ComentariosAdapter(
                    context,
                    R.layout.list_item_comentarios,
                    list_comentarios);


            list_view_comentarios.setAdapter(adapter_coment);

        }
    }

    private void buscarAvaliacaoProduto() {
        ConnectivityManager connMgr = (ConnectivityManager)this.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()){

            url =  this.getString(R.string.link)+"detalhes_avaliacao_produto.php";

            parametros = "id_produto=" + id_produto_vem;

            new DetalhesProduto.preencher_avaliacoes().execute(url);

        }else{

            Toast.makeText(this, "Nenhuma Conexao foi detectada", Toast.LENGTH_LONG).show();
        }
    }

    public class preencher_avaliacoes extends  AsyncTask<String, Void, String>{

        @Override
        protected String doInBackground(String... urls) {
            return  Conexao.postDados(urls[0], parametros);
        }

        @Override
        protected void onPostExecute(String resultado_avaliacao) {
            Gson gson = new Gson();
            MediaAvaliacao[] media_detalhes_produto = gson.fromJson(resultado_avaliacao, MediaAvaliacao[].class);

            TextView limpeza = (TextView) findViewById(R.id.nota_limpeza);
            TextView restaurante = (TextView) findViewById(R.id.nota_restaurante);
            TextView atendimento = (TextView) findViewById(R.id.nota_atendimento);
            TextView lazer = (TextView) findViewById(R.id.nota_lazer);
            TextView media_geral = (TextView) findViewById(R.id.media_geral);

            RatingBar rating_bar = (RatingBar) findViewById(R.id.rating_bar);


            rating_bar.setRating(Float.parseFloat(media_detalhes_produto[0].getMedia_geral()));

            //rating_bar.getStepSize(Integer.parseInt(media_detalhes_produto[0].getMedia_geral()));
            limpeza.setText(media_detalhes_produto[0].getLimpeza());
            restaurante.setText(media_detalhes_produto[0].getRestaurante());
            atendimento.setText(media_detalhes_produto[0].getAtendimento());
            lazer.setText(media_detalhes_produto[0].getLazer());
            media_geral.setText(media_detalhes_produto[0].getMedia_geral());


        }
    }


    private void buscarCaracteristicasProduto() {
        ConnectivityManager connMgr = (ConnectivityManager)this.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()){

            url =  this.getString(R.string.link)+"detalhes_carac_produto.php";

            parametros = "id_produto=" + id_produto_vem;

            new DetalhesProduto.preencher_caracteristicas().execute(url);

        }else{

            Toast.makeText(this, "Nenhuma Conexao foi detectada", Toast.LENGTH_LONG).show();
        }

    }


    public class preencher_caracteristicas extends  AsyncTask<String, Void, String>{

        @Override
        protected String doInBackground(String... urls) {
            return Conexao.postDados(urls[0], parametros);
        }

        @Override
        protected void onPostExecute(String resultado_caracteristica) {
            Gson gson = new Gson();
            Caracteristicas[] carac_detalhes_produto = gson.fromJson(resultado_caracteristica, Caracteristicas[].class);

            for(int i = 0; i < carac_detalhes_produto.length;i++){

                list_caracteristicas.add(carac_detalhes_produto[i]);

            }

            adapter = new CaracteristicasAdapter(
                    context,
                    R.layout.list_item_caracteristicas,
                    list_caracteristicas);


            grid_view_caracteristicas.setAdapter(adapter);


        }
    }


    private void buscarProduto() {

        ConnectivityManager connMgr = (ConnectivityManager)this.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()){

             url =  this.getString(R.string.link)+"detalhes_produto.php";

            parametros = "id_produto=" + id_produto_vem;

            new DetalhesProduto.preencher_produto().execute(url);

        }else{

            Toast.makeText(this, "Nenhuma Conexao foi detectada", Toast.LENGTH_LONG).show();
        }

    }

    private class preencher_produto extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls){


            return Conexao.postDados(urls[0], parametros);

        }

        // onPostExecute displays the results of the AsyncTask.
        @Override
        protected void onPostExecute(String resultado){
            Gson gson = new Gson();
            DetalhesProdutoGetSetter[] detalhesProduto = gson.fromJson(resultado, DetalhesProdutoGetSetter[].class);

            CollapsingToolbarLayout produto = (CollapsingToolbarLayout) findViewById(R.id.toolbar_layout);

            TextView local_produto_selecionado = (TextView) findViewById(R.id.local_produto_selecionado);
            TextView preco_produto_selecionado = (TextView) findViewById(R.id.preco_produto_selecionado);





            try {
                URL url_foto = new URL("http://www.site.tourdreams.com/Parceiro/Arquivos/" +  detalhesProduto[0].getImg_produto());
                Bitmap image = BitmapFactory.decodeStream(url_foto.openConnection().getInputStream());
                Drawable d = new BitmapDrawable(getResources(), image);

                if (Build.VERSION.SDK_INT > 16) {
                    produto.setBackground(d);
                } else {
                    Toast.makeText(context, "Fodase seu celular velho", Toast.LENGTH_SHORT).show();
                }



            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }




            //produto.setBackgroundResource(getString(R.string.link_imagens)+ detalhesProduto[0].getImg_produto());
            //produto.setBackgroundResource();

            produto.setTitle(detalhesProduto[0].getNome());
            local_produto_selecionado.setText(detalhesProduto[0].getLocal());
            preco_produto_selecionado.setText(detalhesProduto[0].getPreco());








        }

    }



}

