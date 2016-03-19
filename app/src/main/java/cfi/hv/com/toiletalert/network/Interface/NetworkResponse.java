package cfi.hv.com.toiletalert.network.Interface;


import cfi.hv.com.toiletalert.network.dto.Response;

/**
 * Created by Himanshu Kumar singh
 *
 */
public interface NetworkResponse {
    public void onResponseFromServer(Response response);
}
