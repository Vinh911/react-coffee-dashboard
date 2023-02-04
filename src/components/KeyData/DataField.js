const DataField = ({ data, label }) => {
    return (
        <div className="data-field">
            <p>{label}</p>
            <p>{data}</p>
        </div>
    );
}

export default DataField;