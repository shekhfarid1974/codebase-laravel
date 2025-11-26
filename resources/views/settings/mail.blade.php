@extends('layouts.app')

@section('title', 'Mail Configuration')
@section('page_title', 'Mail Configure')

@section('content')
<div id="mailView">
    <div class="card">
        <div class="card-header">
            Mail Configuration
        </div>
        <div class="card-body">
            <form id="mailConfigForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Mail Host</label>
                            <input type="text" class="form-control form-control-sm" id="mailHost" value="smtp.accl.com.bd" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Port</label>
                            <input type="number" class="form-control form-control-sm" id="mailPort" value="587" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="email" class="form-control form-control-sm" id="mailUsername" value="noreply@accl.com.bd" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm" id="mailPassword" value="••••••••" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Encryption</label>
                            <select class="form-control form-control-sm" id="mailEncryption">
                                <option value="tls" selected>TLS</option>
                                <option value="ssl">SSL</option>
                                <option value="none">None</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">From Email</label>
                            <input type="email" class="form-control form-control-sm" id="mailFrom" value="noreply@accl.com.bd" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-sm btn-primary btn btn-sm btn-primary-secondary" onclick="resetMailConfig()">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                    <div>
                        <button type="button" class="btn btn-sm btn-primary btn btn-sm btn-primary-warning" onclick="testMailConfig()">
                            <i class="fas fa-paper-plane"></i> Test Mail
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary btn btn-sm btn-primary-primary">
                            <i class="fas fa-save"></i> Save Configuration
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
