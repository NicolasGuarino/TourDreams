package tourdreams.com.br;

import android.content.Context;
import android.support.annotation.NonNull;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by 16165891 on 19/09/2017.
 */

public class CaracteristicasAdapter extends ArrayAdapter<Caracteristicas>{

    int resource;
    public CaracteristicasAdapter(Context context, int resource, List<Caracteristicas> objects) {
        super(context, resource, objects);
        this.resource = resource;
    }

    @NonNull
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        View v = convertView;

        if (v == null) {
            v = LayoutInflater.from(getContext())
                    .inflate(resource,null);
            /* Resource é o layout do item da lista */
        }

        Caracteristicas item = getItem(position); /*Pegando o item que está sendo carregado naquela posição */

        if (item != null) {
            ImageView img_carac = (ImageView) v.findViewById(R.id.img_item_caracteristicas);
            TextView nome_carac = (TextView) v.findViewById(R.id.nome_item_caracteristicas);

            String url_foto_carac = getContext().getString(R.string.link_imagens_carac) + item.getImagem();

            Picasso.with(getContext())
                    .load(url_foto_carac)
                    .into(img_carac);

            nome_carac.setText(item.getNome());
        }

        return v;
    }
}
