package cfi.hv.com.toiletalert.adapter;

import android.content.Context;
import android.text.Html;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Email id : varun.mishra@tothenew.com
 * Contact No :9999191660
 * Skype id : vvarun.mishra
 */


import cfi.hv.com.toiletalert.R;
import cfi.hv.com.toiletalert.dto.Toilet;

public class LoosAdapter extends BaseAdapter {

    private Context context;
    private ArrayList<Toilet> arrayList;

    public LoosAdapter(Context context, ArrayList<Toilet> arrayList) {
        this.context = context;
        this.arrayList = arrayList;
    }

    @Override
    public int getCount() {
        return arrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        final ViewHolder holder;
        if (convertView == null) {
            LayoutInflater mInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = mInflater.inflate(R.layout.loosrow, null);
            holder = new ViewHolder();
            holder.tvTitleDescription = (TextView) convertView.findViewById(R.id.tv_description_faq);
            holder.tvHeading = (TextView) convertView.findViewById(R.id.tv_heading_faq);
            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }
        Toilet faq = arrayList.get(position);
        if (faq != null) {
            holder.tvHeading.setText("Loos Name - "+ faq.getName());
         holder.tvTitleDescription.setText("Loos Address - "+faq.getAddress1()+", "+ faq.getAddress2()+", "+ faq.getCity()+", "+faq.getState()+", "+faq.getPincode());
        }
        return convertView;
    }

    public class ViewHolder {
        private TextView tvTitleDescription;
        private TextView tvHeading;
    }
}
